<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newscategory extends Model
{
     protected $table = "news_categories";
    protected $fillable = [
        'news_cate_title','news_cate_desc','news_cate_status'
    ];
}
