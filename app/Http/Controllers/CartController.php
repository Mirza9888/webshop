<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Product;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $totalPrice = 0;

        foreach ($cart as $id => $details) {
            $totalPrice += $details['price'] * $details ['quantity'];
        }
        $request->session()->put('totalPrice', $totalPrice);

        return view('cart.index', compact('cart', 'totalPrice'));
    }


    public function add(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $product->price,
            ];
        }

        $request->session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Proizvod dodan u košaricu.');
    }


    public function update(Request $request, $productId)
    {
        $quantity = $request->get('quantity', 1);
        $cart = $request->session()->get('cart', []);

        if ($quantity <= 0) {
            unset($cart[$productId]);
        } else {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = max(1, $quantity);
            }
        }

        $request->session()->put('cart', $cart);
        return back()->with('success', 'Košarica ažurirana.');
    }

    public function remove(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        $request->session()->put('cart', $cart);
        return back()->with('success', 'Proizvod uklonjen iz košarice.');
    }

    public function applyDiscount(Request $request)
    {
        $user = auth()->user()->hasRole('Customer');

        if ($user) {
            $totalPrice = $request->session()->get('totalPrice', 0);
            $discountedPrice = $totalPrice - ($totalPrice * 0.10);
            $request->session()->put('totalPrice', $discountedPrice);

            return back()->with('success', 'Primijenjen popust od 10%.');
        }

        return back()->with('error', 'Popust nije primijenjen.');
    }

    public function applyPromoCode(Request $request)
    {
        $promoCode = $request->input('promo_code');

        $promo = PromoCode::where('code', $promoCode)->first();

        if ($promo) {
            $totalPrice = $request->session()->get('totalPrice', 0);
            $discountedPrice = $totalPrice - ($totalPrice * ($promo->discount / 100));
            $request->session()->put('totalPrice', $discountedPrice);

            return back()->with('success', 'Promo kod primijenjen.');
        }

        return back()->with('error', 'Neispravan promo kod.');
    }


//    public function someMethodThatProcessesOrders($orderDetails)
//    {
//        Mail::to($orderDetails->user->email)->send(new OrderShipped($orderDetails));
//    }
}