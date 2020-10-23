<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['id',
        'customer_name', 'customer_email','customer_phone', 'customer_avatar', 'customer_address', 'customer_password', 'google_id'
    ];
}
