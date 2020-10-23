<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'brand_desc', 'brand_image','brand_status'
    ];
    protected $table='brands';
    public function products(){
        return $this->hasMany('App\Product','brand_id','id');
    }
}
