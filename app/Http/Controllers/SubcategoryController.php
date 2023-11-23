<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of subcategories for a specific category.
     */
    public function index($categoryId)
    {
        $category = Category::with('children')->findOrFail($categoryId);
        $subcategories = $category->children;

        return view('subcategories.index', compact('category', 'subcategories'));
    }

    /**
     * Show the form for creating a new subcategory within a specific category.
     */
    public function create($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        return view('subcategories.create', compact('category'));
    }

    /**
     * Store a newly created subcategory in storage.
     */
    public function store(CategoryRequest $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $data = $request->validated();
        $data['parent_id'] = $category->id;

        Category::create($data);

        return redirect()->route('categories.subcategories.index', $categoryId)->with('success', 'Podkategorija uspešno dodata.');
    }

    /**
     * Display the specified subcategory.
     */
    public function show($categoryId, $id)
    {
        $subcategory = Category::where('id', $id)->where('parent_id', $categoryId)->firstOrFail();

        return view('subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified subcategory.
     */
    public function edit($categoryId, $id)
    {
        $subcategory = Category::where('id', $id)->where('parent_id', $categoryId)->firstOrFail();

        return view('subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified subcategory in storage.
     */
    public function update(CategoryRequest $request, $categoryId, $id)
    {
        $subcategory = Category::where('id', $id)->where('parent_id', $categoryId)->firstOrFail();
        $data = $request->validated();
        $subcategory->update($data);

        return redirect()->route('categories.subcategories.index', $categoryId);
    }

    /**
     * Remove the specified subcategory from storage.
     */
    public function destroy($categoryId, $id)
    {
        DB::transaction(function () use ($categoryId, $id) {
            $subcategory = Category::where('id', $id)->where('parent_id', $categoryId)->firstOrFail();
            $subcategory->delete();
        });

        return redirect()->route('categories.subcategories.index', $categoryId);
    }
}
