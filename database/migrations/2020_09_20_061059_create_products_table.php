<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_code')->unique();
            $table->string('product_name')->unique();
            $table->unsignedBigInteger('cate_pro_id');
            $table->foreign('cate_pro_id')->references('cate_pro_id')->on('categories');
            $table->unsignedBigInteger('sub_id');
            $table->foreign('sub_id')->references('sub_id')->on('categories');
            $table->longText('product_desc');
            $table->longText('product_content');
            $table->integer('product_price');
            $table->integer('product_price_sale');
            $table->string('product_image');
            $table->integer('product_status');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
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
        Schema::dropIfExists('products');
    }
}
