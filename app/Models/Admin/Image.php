<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table= 'table_images';
    protected $fillable=['id','image','product_id'];
    public function product(){
        return $this->belongsTo('App\Product','product_id','product_id');
    }
}
