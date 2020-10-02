<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $table = 'customs';
    protected $fillable = [
        'custom_name','custom_email','custom_phone','custom_avatar','custom_address','custom_password'
    ];
}
