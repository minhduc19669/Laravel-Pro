<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['product_id',
        'product_name','product_code','product_desc','product_image','product_content','product_price','product_price_sale','product_status','cate_pro_id','brand_id','sub_id'
        ];
    protected $primaryKey='product_id';

    public function categories(){
        return $this->hasMany('App\Category','cate_pro_id','product_id');
    }
    public function subcategories(){
        return $this->belongsTo('App\Category','sub_id','product_id');
    }
    public function brands(){
        return $this->belongsTo('App\Brand','brand_id','id');
    }
    public function images(){
        return $this->hasMany('App\Image','product_id','product_id');
    }




}
