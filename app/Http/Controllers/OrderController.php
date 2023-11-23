<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $countries = config('countries');


        return view('orders.index', compact('orders', 'countries'));
    }
    public function create(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $id => $details) {
            $totalPrice += $details['price'] * $details['quantity'];
        }

        $request->session()->put('totalPrice', $totalPrice);

        $countries = config('countries');
        return view('orders.create', compact('countries'));
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();
        $data['total_price'] = $request->session()->get('totalPrice', 0);

        $order = Order::create($data);

        session()->forget('cart');
        if (auth()->check() && Auth::user()->hasRole('Admin')) {
            return redirect()->route('orders.index');
        } else {
            return redirect()->route('orders.show', $order->id);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $id)
    {
        $order = Order::findOrFail($id);
        $data = $request->validated();
        $order->update($data);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $order = Order::findOrFail($id);

            $order->delete();
        });
        return redirect('/orders');
    }
}

