<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{

    function list()
    {
        if (Cache::has('Products')) {
            $products = Cache::get('Products');
        }else{
            $products = Cache::remember('Products',now()->addDay(7), function () {
                return Product::all();
            });
        }
        return view('welcome')
            ->with('products', $products);
    }

    function index($id)
    {
        if (Cache::has('Product_'.$id)) {
            $product = Cache::get('Product_'.$id);
        }else{
            $product = Cache::remember('Product_'.$id,now()->addDay(7), function () use ($id) {
                return Product::find($id);
            });
        }
        return view('product-detail',compact('product'));
    }
}
