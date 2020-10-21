<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //blog
    public function blogDetail($id){
        $news = News::where('news_id',$id)->get();
        return view('pages.blog_detail',compact('news'));
    }
}
