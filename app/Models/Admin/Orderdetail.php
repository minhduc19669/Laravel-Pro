<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = [
"order_id","product_id","product_name","product_price","product_quantity",
    ];
    protected $table = "orders_details";
}
