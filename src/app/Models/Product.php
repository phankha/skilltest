<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['category_id', 'brand_id', 'description', 'delivery', 'guarantees_payment', 'price', 'special_price', 'featured', 'date', 'extras'];

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
        return $this->hasMany('App\Models\ProductImages', 'product_images');
    }
}
