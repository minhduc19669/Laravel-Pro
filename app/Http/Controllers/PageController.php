<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Http\Services\ProductService;
use App\News;
use App\Product;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $productServ;
    public function __construct(ProductService $productServ)
    {
        $this->productServ=$productServ;
    }

    public function allProduct(){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $products= $this->productServ->get(10);
        return \view('pages.product',\compact('products','category','brand'));
    }
    public function productDetail($id){
        $product=$this->productServ->productDetail($id);
        $images=$this->productServ->getImageProduct($id);
        return \view('pages.product_details',\compact('product','images'));
    }

    public function showBlog(){
        $news= News::all();
        return \view('pages.blog',\compact('news'));
    }
    public function blogDetails($id){
        $news=News::find($id);
        return \view('pages.blog_detail',\compact('news'));
    }


    public function  productCategory($id){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Category::where('cate_pro_id',$id)->first();
        $products = Product::where('cate_pro_id',$cate_pro->cate_pro_id)->get();
        return \view('pages.product',\compact('products','category','brand'));
    }
    public function  productSubcategory($id){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Category::where('sub_id',$id)->first();
        $products = Product::where('sub_id',$cate_pro->sub_id)->get();
        return \view('pages.product',\compact('products','category','brand'));
    }
    public function  productBrand($id){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Brand::where('id',$id)->first();
        $products = Product::where('brand_id',$cate_pro->id)->get();
        return \view('pages.product',\compact('products','category','brand'));
    }

    //
}
