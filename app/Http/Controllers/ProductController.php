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
    public function index(Request $request)
    {
        $products = Product::with(['category', 'category.parent'])->get();
        $categories = Category::all();

        $category_id = $request->input('category');
        $search = $request->input('search');
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
        } else {
            $products = Product::all();
        }
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();


        $product = new Product($data);
        $product->is_discounted = $request->has('is_discounted');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->name, '-') . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images', $filename);
            $product->image = $filename; //
        }


        $product->save();


        return redirect()->route('products.index')->with('success', 'Proizvod je uspešno kreiran.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();
        $data['is_discounted'] = $request->has('is_discounted');
        if ($data['is_discounted']) {
            $data['discounted_price'] = $request->input('discounted_price');
        } else {
            // Ako nije na sniženju, postavite discounted_price na null ili drugu odgovarajuću vrijednost
            $data['discounted_price'] = null;
        }


        $product->update($data);
        $product->category_id = $request->input('category_id');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $product = Product::findOrFail($id);

            $product->delete();
        });
        return redirect('products');
    }

    public function landing()
    {
        $products = Product::all();
        foreach ($products as $product) {
            if ($product->is_discounted) {
                $product->display_price = $product->discounted_price;
                $product->original_price = $product->price;
            } else {

                $product->display_price = $product->price;
                $product->original_price = null;
            }
        }

        $categories = Category::all();

        return view('products.landing', compact('products', 'categories'));
    }

    public function category($subcategoryId)
    {
        $subcategory = Category::findOrFail($subcategoryId);
        $products = Product::where('category_id', $subcategoryId)->get();

        return view('products.category', compact('products', 'subcategory'));
    }


}
