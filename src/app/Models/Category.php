<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    const TABLE = 'category';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'parent_id'];
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
    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected static function boot()
    {
        parent::boot();
        Category::created(function ($category) {
            Cache::put('Categories',Category::all());
            Cache::put('category_'.$category->id,$category);
        });
        Category::updated(function ($category) {
            Cache::put('Categories',Category::all());
            Cache::put('category_'.$category->id,$category);
        });
        Category::deleting(function ($category) {
            Product::where('category_id',$category->id)->update(['category_id'=> null]);
        });
        Category::deleted(function ($category) {
            Cache::forget('category_'.$category->id);
            Cache::put('Categories',Category::all());
        });
    }
}
