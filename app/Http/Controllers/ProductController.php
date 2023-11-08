<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request){
        // Validacija je već urađena u ProductRequest, pa možemo odmah pristupiti podacima
        $data = $request->validated();

        // Kreiranje novog proizvoda
        $product = new Product($data);

        // Obrada i čuvanje slike
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->name, '-') . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename); // Sačuvaj u "storage/app/public/images"
            $product->image = $filename; // Sačuvaj samo ime datoteke u bazu podataka
        }

        // Sačuvaj proizvod
        $product->save();

        // Redirect na stranicu sa svim proizvodima sa porukom uspeha
        return redirect()->route('products.index')->with('success', 'Proizvod je uspešno kreiran.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit',compact('product','categories'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();



        $product->update($data);
        $product->categories()->sync($request->input('categories'));

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id){

            $product = Product::findOrFail($id);

            $product->delete();

        });
        return redirect('/products');
    }
}
