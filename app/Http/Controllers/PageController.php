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
//product
    public function allProduct(){
        $category_news =Category::all();
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $products= $this->productServ->get(10);
        return \view('pages.product',\compact('products','category','brand','category_news'));
    }
    public function productDetail($id){
<<<<<<< HEAD
        $product=$this->productServ->productDetail($id);
=======
       
        $product=$this->productServ->productDetail($id);

>>>>>>> 04e73f592c04cf68996a2577b66ae0a4bcab6c43
        $images=$this->productServ->getImageProduct($id);
        $productRelated=$this->productServ->getProductRelatedTo($id);
        return \view('pages.product_details',\compact('product','images', 'productRelated','image'));
    }

<<<<<<< HEAD

=======
 
    }
>>>>>>> 04e73f592c04cf68996a2577b66ae0a4bcab6c43
    public function  productCategory($id){
        $category_news =Category::all();
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Category::where('cate_pro_id',$id)->first();
        $products = Product::where('cate_pro_id',$cate_pro->cate_pro_id)->get();
        return \view('pages.product',\compact('products','category','brand','category_news'));
    }
    public function  productSubcategory($id){
        $category_news =Category::all();
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Category::where('sub_id',$id)->first();
        $products = Product::where('sub_id',$cate_pro->sub_id)->get();
        return \view('pages.product',\compact('products','category','brand','category_news'));
    }
    public function  productBrand($id){
        $category_news =Category::all();
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Brand::where('id',$id)->first();
        $products = Product::where('brand_id',$cate_pro->id)->get();
        return \view('pages.product',\compact('products','category','brand','category_news'));
    }
//blog
    public function showBlog(){
        $category_news =Category::all();
        $news= News::all();
        return \view('pages.blog',\compact('news','category_news'));
    }
    public function blogDetails($id){
        $category_news =Category::all();
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_news = Category::all();
        $news = News::where('news_id',$id)->get();
        foreach ($news as $value){
            $cate_news_id = $value->category_id;
        }
        $related = News::join('categories','categories.cate_news_id','=','news.category_id')
            ->where('category_id',$cate_news_id)
            ->whereNotIn('news.news_id',[$id])
             ->get();
        return \view('pages.blog_detail',\compact('news','category','brand','cate_news','related','category_news'));
    }
    public function blogCategory($id){
           $category = Category::where('cate_news_id',$id)->first();
           $news = News::where('category_id',$category->cate_news_id)->get();
        return view('pages.blogCategory',compact('news'));
    }

}
