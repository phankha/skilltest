<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Cache;

class Brand extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    const TABLE = 'brand';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
     */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected static function boot()
    {
        parent::boot();
        Brand::created(function ($brand) {
            Cache::put('Brands',Brand::all());
            Cache::put('brand_'.$brand->id,$brand);
        });
        Brand::updated(function ($brand) {
            Cache::put('Brands',Brand::all());
            Cache::put('brand_'.$brand->id,$brand);
        });
        Brand::deleted(function ($brand) {
            Cache::forget('brand_'.$brand->id);
            Cache::put('Brands',Brand::all());
        });
    }
}
