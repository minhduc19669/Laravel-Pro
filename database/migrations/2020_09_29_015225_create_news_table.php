<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_title');
            $table->unsignedBigInteger('news_cate_id');
            $table->foreign('news_cate_id')->references('id')->on('news_categories');
            $table->string('news_content');
            $table->string('news_image');
            $table->string('news_desc');
            $table->string('news_view');
            $table->string('news_date');
            $table->string('news_status');
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
        Schema::dropIfExists('=news');
    }
}
