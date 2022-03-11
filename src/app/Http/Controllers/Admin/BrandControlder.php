<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class BrandControlder extends Controller
{
    /**
     * Display a listing of the brand.
     */
    public function index()
    {
        if (Cache::has('Brands')) {
            $brands = Cache::get('Brands');
        }else{
            $brands = Cache::remember('Brands',now()->addDay(7), function () {
                return Brand::all();
            });
        }

        return view('admin.pages.brands.index')
            ->with('brands', $brands);
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create()
    {
        return view('admin.pages.brands.create');
    }

    /**
     * Store a newly created brand in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Brand::create($request->all());

        return redirect()->route('brands.index')
            ->with('success','Brand created successfully.');
    }

    /**
     * Show the form for editing the brand resource.
     *
     * @param    \App\Models\Brand $brand
     */
    public function edit(Brand $brand)
    {
        return view('admin.pages.brands.edit',compact('brand'));
    }

    /**
     * Update the brand in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand $brand
     */
    public function update(Request  $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $brand->update($request->all());

        return redirect()->route('brands.index')
            ->with('success','Brand updated successfully');
    }

    /**
     * Remove the brand from storage.
     *
     * @param  int  $id
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success','Brand deleted successfully');
    }
}
