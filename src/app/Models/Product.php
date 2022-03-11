<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    const TABLE = 'product';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'brand_id', 'description', 'delivery', 'guarantees_payment', 'price', 'special_price'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImages', 'product_id');
    }

    protected static function boot()
    {
        parent::boot();
        Product::created(function ($product) {
            Cache::put('Products',Product::all());
            Cache::put('Product_'.$product->id,$product);
        });
        Product::updated(function ($product) {
            Cache::put('Products',Product::all());
            Cache::put('Product_'.$product->id,$product);
        });
        Product::deleting(function ($product) {
            $product->images()->each(function($image) {
                $image->delete();
            });
        });
        Product::deleted(function ($product) {
            Cache::put('Products',Product::all());
            Cache::forget('Product_'.$product->id);
        });
    }
}
