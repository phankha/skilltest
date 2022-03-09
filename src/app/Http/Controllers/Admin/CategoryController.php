<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.category.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $categories =  Category::all();
        return view('admin.pages.category.create')->with('categories', $categories);
    }

    /**
     * Store a newly created category in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
            ->with('success','Category created successfully.');
    }

    /**
     * Show the form for editing the category resource.
     *
     * @param    \App\Models\Category $category
     */
    public function edit(Category $category)
    {
        $categories =  Category::all()->except($category->id);
        return view('admin.pages.category.edit',compact('category','categories'));
    }

    /**
     * Update the brand in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     */
    public function update(Request  $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success','Category updated successfully');
    }

    /**
     * Remove the brand from storage.
     *
     * @param  \App\Models\Category $category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success','Category deleted successfully');
    }
}
