<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'customer_name', 'customer_email','customer_phone', 'customer_avatar', 'customer_address', 'customer_password'
    ];
}
