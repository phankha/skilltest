<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(\App\Models\Product::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->nullable()->constrained(\App\Models\Category::TABLE);
            $table->foreignId('brand_id')->nullable()->constrained(\App\Models\Brand::TABLE);
            $table->longText('description')->nullable();
            $table->longText('delivery')->nullable();
            $table->longText('guarantees_payment')->nullable();
            $table->decimal('price')->default(0.00)->nullable();
            $table->decimal('special_price')->default(0.00)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(\App\Models\Product::TABLE);
    }
}
