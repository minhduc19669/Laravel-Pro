<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Customer;
use App\Http\Services\ProductService;
use App\News;
use App\Post;
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
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $products= $this->productServ->get(10);
        return \view('pages.product',\compact('products','category','brand'));
    }
    public function productDetail($id){
        $product=$this->productServ->productDetail($id);
        $images=$this->productServ->getImageProduct($id);
        $post=Post::where('id_product',$id)->orderBy('created_at','desc')->paginate(4);
        $rating = Post::where('id_product', $id)->where('rating', '>', '0')->get();
        $star1 = Post::where('id_product', $id)->where('rating', '=', '1')->get();
        $star2 = Post::where('id_product', $id)->where('rating', '=', '2')->get();
        $star3 = Post::where('id_product', $id)->where('rating', '=', '3')->get();
        $star4 = Post::where('id_product', $id)->where('rating', '=', '4')->get();
        $star5 = Post::where('id_product', $id)->where('rating', '=', '5')->get();
        $countStar = [];
        $count1star = count($star1);
        $count2star = count($star2);
        $count3star = count($star3);
        $count4star = count($star4);
        $count5star = count($star5);
        $countRating = count($rating);
        array_push($countStar, $count1star, $count2star, $count3star, $count4star, $count5star);
        $sum = $rating->sum('rating');
        $percent = [];
        if ($countRating != 0) {
            $percent1 = ($count1star / $countRating) * 100;
            $percent2 = ($count2star / $countRating) * 100;
            $percent3 = ($count3star / $countRating) * 100;
            $percent4 = ($count4star / $countRating) * 100;
            $percent5 = ($count5star / $countRating) * 100;
            array_push($percent, $percent1, $percent2, $percent3, $percent4, $percent5);
            $avg = $sum / $countRating;
        } else {
            $avg = 0;
        }
        $total=\count($post);
        $productRelated=$this->productServ->getProductRelatedTo($id);
        return \view('pages.product_details',\compact('product','images', 'productRelated','image','post', 'countRating', 'sum', 'avg', 'countStar', 'percent','total'));
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
//about

 public function about(){
        return view('pages.about');
 }
 //contact
    public function contact(){
        return view('pages.contact');
    }
   public function search(Request $request){
       $brand = Brand::all();
       $category = Category::with('SubCategories')->get();
       $products = Product::orWhere('product_name', 'like', '%'.$request->key.'%')
           ->orWhere('product_code', 'like', '%'.$request->key.'%')
           ->orderBy('products.product_id', 'desc')
           ->get();
       return view('pages.search_product',compact('products','category','brand'));
   }




}
