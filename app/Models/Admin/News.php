<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable = [
      'news_title'  , 'news_cate_id','news_content','news_image','news_desc','news_view','news_date',
        'news_status'
    ];
    public function newCategory(){
        return $this->belongsTo('App\Category','category_id','cate_news_id');
    }

}
