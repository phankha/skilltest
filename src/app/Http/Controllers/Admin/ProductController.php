<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.pages.product.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories =  Category::all();
        $brands = Brand::all();
        return view('admin.pages.product.create', compact( 'categories', 'brands'));
    }

    /**
     * Store a newly created product in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $product_id = Product::insertGetId([
            'name'               =>   $request->name,
            'category_id'        =>   $request->category_id,
            'brand_id'           =>   $request->brand_id,
            'price'              =>   $request->price,
            'special_price'      =>   $request->special_price,
            'description'        =>   $request->description,
            'delivery'           =>   $request->delivery,
            'guarantees_payment' =>   $request->guarantees_payment,
        ]);

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $image)
            {
                $name = $product_id.'_'.$image->getClientOriginalName();
                $image_path = '/images/products/'.$name;
                $image->storeAs('public/images/products',$name);

                ProductImages::insert([
                    'product_id' => $product_id,
                    'image' =>  $image_path

                ]);
            }
        }

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Show the form for editing the product resource.
     *
     * @param    \App\Models\Product $product
     */
    public function edit(Product $product)
    {
        $categories =  Category::all();
        $brands = Brand::all();
        $images = ProductImages::where('product_id',$product->id)->get();
        return view('admin.pages.product.edit',compact('product','categories', 'brands','images'));
    }


    /**
     * Update the product in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     */
    public function update(Request  $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $product->update($request->all());

        // remove old image
        if($request->removeImage){
            foreach($request->removeImage as $image_id){
                ProductImages::destroy($image_id);
            }
        }

        // add new image
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $image)
            {
                $name = $product->id.'_'.$image->getClientOriginalName();
                $image_path = '/images/products/'.$name;
                $image->storeAs('public/images/products',$name);

                ProductImages::insert([
                    'product_id' => $product->id,
                    'image' =>  $image_path

                ]);
            }
        }

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the product from storage.
     *
     * @param  \App\Models\Product $product
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}
