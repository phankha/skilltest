<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class demo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand_id = DB::table(Brand::TABLE)->insertGetId([
            'name' => 'Brand Name',
        ]);

        $category_id = DB::table(Category::TABLE)->insertGetId([
            'name' => 'Women\'s Top',
        ]);

        $product_id = DB::table(Product::TABLE)->insertGetId([
            'name' => 'Product Names',
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'delivery' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'guarantees_payment' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => '75.00',
            'special_price' => '55.00'
        ]);

        DB::table(ProductImages::TABLE)->insert([
            [
                'product_id' => $product_id,
                'image' => '/images/products/600x450-01.png'
            ],[
                'product_id' => $product_id,
                'image' => '/images/products/600x450-02.png'
            ],[
                'product_id' => $product_id,
                'image' => '/images/products/600x450-03.png'
            ],[
                'product_id' => $product_id,
                'image' => '/images/products/600x450-04.png'
            ],
        ]);
        if ( !is_dir( storage_path('app/public/images/products/') ) ) {
            mkdir(storage_path('app/public/images/products/'), 775, true);
            copy(public_path('images/demo/600x450-01.png'), storage_path('app/public/images/products/600x450-01.png'));
            copy(public_path('images/demo/600x450-02.png'), storage_path('app/public/images/products/600x450-02.png'));
            copy(public_path('images/demo/600x450-03.png'), storage_path('app/public/images/products/600x450-03.png'));
            copy(public_path('images/demo/600x450-04.png'), storage_path('app/public/images/products/600x450-04.png'));
        }


    }
}
