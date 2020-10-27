<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table= 'transports';
    protected $fillable = [
      'id','city_id','district_id','fee',
    ];

    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
    public function district(){
        return $this->belongsTo('App\District','district_id','id');
    }
}
