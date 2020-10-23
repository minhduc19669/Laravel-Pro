<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCityDictrisOnShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('shippings', function (Blueprint $table) {
            $table->string('shipping_city_receive')->after('shipping_address_receive');
            $table->string('shipping_district_receive')->after('shipping_city_receive');
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
        Schema::drop('shippings', function (Blueprint $table) {
            $table->dropColumn('shipping_city_receive');
            $table->dropColumn('shipping_district_receive');
        });
    }
}
