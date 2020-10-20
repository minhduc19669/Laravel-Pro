<?php

namespace App\Http\Controllers;
use App\Http\Services\ProductService;
use App\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $productServ;
    public function __construct(ProductService $productServ)
    {
        $this->productServ=$productServ;
    }

    public function allProduct(){
        $products= $this->productServ->get(10);
        return \view('pages.product',\compact('products'));
    }
    public function productDetail($id){

        $product=$this->productServ->productDetail($id);
        return \view('pages.product_details',\compact('product'));
    }
    public function showBlog(){
        $news= News::all();
        return \view('pages.blog',\compact('news'));
    }
    public function blogDetails($id){
        $news=News::find($id);
        return \view('pages.blog_detail',\compact('news'));
    }


    //
}
