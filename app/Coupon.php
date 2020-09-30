<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $table='coupons';
    protected $fillable=['coupon_name','coupon_price','coupon_code','coupon_time','coupon_condition', 'coupon_number'];
}
