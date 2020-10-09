<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('cate_pro_id')->unique()->nullable();
            $table->unsignedBigInteger('cate_news_id')->unique()->nullable();
            $table->unsignedBigInteger('sub_id')->unique()->nullable();
            $table->string('category_product_name')->unique()->nullable();
            $table->string('category_news_name')->unique()->nullable();
            $table->string('category_sub_product_name')->unique()->nullable();
            $table->string('category_sub_product_desc')->nullable();
            $table->string('category_product_desc')->nullable();
            $table->string('category_news_desc')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
