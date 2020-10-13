<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
      'user_id'  ,'shipping_id' ,'order_code','order_status','created_at','updated_at','order_id'];
    public function order_detail(){

        return $this->belongsTo('App\Orderdetail');
    }
}
