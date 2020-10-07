<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['product_id',
        'product_name','product_code','product_desc','product_image','product_content','product_price','product_price_sale','product_status','category_id','brand_id'
        ];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    protected $primaryKey='product_id';




}
