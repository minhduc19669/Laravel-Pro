<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('shippings',function(Blueprint $table){
            $table->string('shipping_city')->after('shipping_address');
            $table->string('shipping_district')->after('shipping_city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('shippings',function(Blueprint $table){
            $table->dropColumn('shipping_city');
            $table->dropColumn('shipping_district');
        });
    }
}
