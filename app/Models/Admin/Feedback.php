<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table ='feedback';
    protected $fillable = [
      'name','email','title','content','status'
    ];
}
