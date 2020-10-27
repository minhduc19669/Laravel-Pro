<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    //
    protected $table='posts';
    protected $fillable=[
        'id','content','rating','customer_id','id_product','parent_id'
    ];
    public function Customer (){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

}
