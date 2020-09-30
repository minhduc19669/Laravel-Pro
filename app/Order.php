<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
      'user_id'  ,'shipping_id' ,'order_total','order_status'
    ];
}
