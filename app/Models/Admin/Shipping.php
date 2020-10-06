<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = "shippings";
    protected $fillable = [
      "shipping_name"  ,"shipping_phone","shipping_address","shipping_email","shipping_name_receive","shipping_phone_receive",
        "shipping_address_receive","shipping_information","shipping_node","shipping_payment"

    ];
}
