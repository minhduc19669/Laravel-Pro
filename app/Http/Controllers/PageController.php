<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Customer;
use App\Http\Services\ProductService;
use App\News;
use App\Order;
use App\Post;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $productServ;
    public function __construct(ProductService $productServ)
    {
        $this->productServ=$productServ;
    }
//product

    public function allProduct(Request $request){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $count = $request->search;
        $products= Product::paginate(12);
        if ($request->ajax()){
            return \view('pages.product',\compact('products','category','brand','count'));
        }
        return \view('pages.product',\compact('products','category','brand','count'));
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
    public function  productCategory( Request $request,$id){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Category::where('cate_pro_id',$id)->first();
        $products = Product::where('cate_pro_id',$cate_pro->cate_pro_id)->paginate(9);
        if($request->ajax()){
            return \view('pages.category_product',\compact('products','category','brand'));
        }
        return \view('pages.pagination_category_product',\compact('products','category','brand'));
    }
    public function  productSubcategory(Request $request,$id){
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Category::where('sub_id',$id)->first();
        $products = Product::where('sub_id',$cate_pro->sub_id)->paginate(9);
        if ($request->ajax()){
            return \view('pages.subcategory_product',\compact('products','category','brand','id'));
        }
        return \view('pages.pagination_subcategory',\compact('products','category','brand','id'));
    }
    public function  productBrand(Request $request,$id){
        $category_news =Category::all();
        $count = $request->search;
        $brand = Brand::all();
        $category = Category::with('SubCategories')->get();
        $cate_pro= Brand::where('id',$id)->first();
        $products = Product::where('brand_id',$cate_pro->id)->paginate(9);
        if ($request->ajax()){
            return \view('pages.brand_product',\compact('products','category','brand','category_news','id','count'));

        }
        return \view('pages.pagination_brand_product',\compact('products','category','brand','category_news','id','count'));
    }
//blog
    public function showBlog(Request $request){
        $category_news =Category::all();
        $news= News::paginate(4);
            if ($request->ajax()){
                return \view('pages.blog',\compact('news','category_news'));
            }
        return \view('pages.pagination_blog',\compact('news','category_news'));
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
    public function blogCategory(Request $request,$id){
           $category = Category::where('cate_news_id',$id)->first();
           $news = News::where('category_id',$category->cate_news_id)->paginate(4);
           if ($request->ajax()){
               return view('pages.blogCategory',compact('news'));
           }
        return view('pages.pagination_categoryNews',compact('news'));
    }
//about

 public function about(){
        return view('pages.about');
 }
 public function account($id){
     $customer=Customer::find($id);
     $orders=Order::where('customer_id',$id)->get();
     return \view('pages.account',\compact('customer','orders'));
 }
 //contact
    public function contact(){
        return view('pages.contact');
    }
   public function search(Request $request){
       $brand = Brand::all();
       $category = Category::with('SubCategories')->get();
       $products = Product::join('brands','brands.id','=','products.brand_id')
           ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
           ->orWhere('brand_name', 'like', '%'.$request->key.'%')
           ->orWhere('category_product_name', 'like', '%'.$request->key.'%')
           ->orWhere('product_name', 'like', '%'.$request->key.'%')
           ->orWhere('product_code', 'like', '%'.$request->key.'%')
           ->orderBy('products.product_id', 'desc')
           ->paginate(9);
       if ($request->ajax()){
           return view('pages.search_product',compact('products','category','brand'));

       }
       return view('pages.pagination_search_product',compact('products','category','brand'));
   }
   public function searchAjax(Request $request){
      if($request->ajax()){
      $output = '';
          $products = Product::join('brands','brands.id','=','products.brand_id')
              ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
              ->orWhere('brand_name', 'like', '%'.$request->search_product.'%')
              ->orWhere('category_product_name', 'like', '%'.$request->search_product.'%')
              ->orWhere('product_name', 'like', '%'.$request->search_product.'%')
              ->orWhere('product_code', 'like', '%'.$request->search_product.'%')
              ->orderBy('products.product_id', 'desc')
              ->get();
          if ($products){
              foreach ($products as $key =>$product){
                $output .= '
                       <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                    <div id="productSearch" class="product-wrapper mb-10">
                      <div class="product-img">
                        <a href="'.route('product.details',$product->product_id).'">
                        <img width="100px" height="230px" src="/storage/'.$product->product_image.'" alt=""/>
                        </a>
                        <div class="product-action">
                          <a style="cursor: pointer;" id="addtocartSearch" data-id='.$product->product_id.' title="Add To Cart">
                            <i class="ti-shopping-cart"></i>
                          </a>
                        </div>
                        <div class="product-action-wishlist">
                          <a title="Wishlist" href="#">
                            <i class="ti-heart"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-content">
                        <h4>
                        <a href="'.route('product.details',$product->product_id).'">'.$product->product_name.'</a>
                        </h4>
                        <div class="product-price">
                        <span class="new">'.number_format($product->product_price).'<u>đ</u></span>
                        <span class="old">'.number_format(($product->product_price)-($product->product_price_sale)).'<u>đ</u></span>
                        </div>
                      </div>
                      <div class="product-list-content">
                        <h4><a href="#">'.$product->product_name.'</a></h4>
                        <div class="product-price">
                          <span class="new">'.number_format($product->product_price).'<u>đ</u> </span>
                        </div>
                        <p>
                          '.$product->product_desc.'
                        </p>
                        <div class="product-list-action">
                          <div  class="product-list-action-left">
                            <a
                            id="addtocartSearch"
                            search-id="'.$product->product_id.'"
                              class="addtocart-btn"
                              title="Add to cart"
                              href="#"
                              ><i class="ion-bag"></i> Add to cart</a
                            >
                          </div>
                          <div class="product-list-action-right">
                            <a title="Wishlist" href="#"
                              ><i class="ti-heart"></i
                            ></a>
                            <a
                              title="Quick View"
                              data-toggle=odal"
                              data-target="#exampleModal"
                              href="#"
                              ><i class="ti-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ';

              }
          }
          return Response($output);

      }
   }

    public function searchBrandAjax(Request $request){
        if($request->ajax()){
            $output = '';
            $products = Product::join('brands','brands.id','=','products.brand_id')
                ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
                ->orWhere('brand_name', 'like', '%'.$request->search_product.'%')
                ->orWhere('category_product_name', 'like', '%'.$request->search_product.'%')
                ->orWhere('product_name', 'like', '%'.$request->search_product.'%')
                ->orWhere('product_code', 'like', '%'.$request->search_product.'%')
                ->orderBy('products.product_id', 'desc')
                ->get();
            if ($products){
                foreach ($products as $key =>$product){
                    $output .= '
                       <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                    <div id="productBrandSearch" class="product-wrapper mb-10">
                      <div class="product-img">
                        <a href="'.route('product.details',$product->product_id).'">
                        <img width="100px" height="230px" src="/storage/'.$product->product_image.'" alt=""/>
                        </a>
                        <div class="product-action">
                          <a style="cursor: pointer;" id="addtocartBrandSearch" data-id='.$product->product_id.' title="Add To Cart">
                            <i class="ti-shopping-cart"></i>
                          </a>
                        </div>
                        <div class="product-action-wishlist">
                          <a title="Wishlist" href="#">
                            <i class="ti-heart"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-content">
                        <h4>
                        <a href="'.route('product.details',$product->product_id).'">'.$product->product_name.'</a>
                        </h4>
                        <div class="product-price">
                        <span class="new">'.number_format($product->product_price).'<u>đ</u></span>
                        <span class="old">'.number_format(($product->product_price)-($product->product_price_sale)).'<u>đ</u></span>
                        </div>
                      </div>
                      <div class="product-list-content">
                        <h4><a href="#">'.$product->product_name.'</a></h4>
                        <div class="product-price">
                          <span class="new">'.number_format($product->product_price).'<u>đ</u> </span>
                        </div>
                        <p>
                          '.$product->product_desc.'
                        </p>
                        <div class="product-list-action">
                          <div  class="product-list-action-left">
                            <a
                            id="addtocartBrandSearch" data-id='.$product->product_id.'
                              class="addtocart-btn"
                              title="Add to cart"
                              href="#"
                              ><i class="ion-bag"></i> Add to cart</a
                            >
                          </div>
                          <div class="product-list-action-right">
                            <a title="Wishlist" href="#"
                              ><i class="ti-heart"></i
                            ></a>
                            <a
                              title="Quick View"
                              data-toggle=odal"
                              data-target="#exampleModal"
                              href="#"
                              ><i class="ti-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ';

                }
            }
            return Response($output);

        }
    }
    public function searchSubcategoryAjax(Request $request,$id){
        if($request->ajax()){
            $output = '';
            $products = Product::join('brands','brands.id','=','products.brand_id')
                ->join('categories','categories.cate_pro_id','=','products.cate_pro_id')
                ->orWhere('brand_name', 'like', '%'.$request->search_product.'%')
                ->orWhere('category_product_name', 'like', '%'.$request->search_product.'%')
                ->orWhere('product_name', 'like', '%'.$request->search_product.'%')
                ->orWhere('product_code', 'like', '%'.$request->search_product.'%')
                ->orderBy('products.product_id', 'desc')
                ->get();
            if ($products){
                foreach ($products as $key =>$product){
                    $output .= '
                       <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                    <div id="productSubSearch" class="product-wrapper mb-10">
                      <div class="product-img">
                        <a href="'.route('product.details',$product->product_id).'">
                        <img width="100px" height="230px" src="/storage/'.$product->product_image.'" alt=""/>
                        </a>
                        <div class="product-action">
                          <a style="cursor: pointer;" id="addtocartSubSearch" data-id='.$product->product_id.' title="Add To Cart">
                            <i class="ti-shopping-cart"></i>
                          </a>
                        </div>
                        <div class="product-action-wishlist">
                          <a title="Wishlist" href="#">
                            <i class="ti-heart"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-content">
                        <h4>
                        <a href="'.route('product.details',$product->product_id).'">'.$product->product_name.'</a>
                        </h4>
                        <div class="product-price">
                        <span class="new">'.number_format($product->product_price).'<u>đ</u></span>
                        <span class="old">'.number_format(($product->product_price)-($product->product_price_sale)).'<u>đ</u></span>
                        </div>
                      </div>
                      <div class="product-list-content">
                        <h4><a href="#">'.$product->product_name.'</a></h4>
                        <div class="product-price">
                          <span class="new">'.number_format($product->product_price).'<u>đ</u> </span>
                        </div>
                        <p>
                          '.$product->product_desc.'
                        </p>
                        <div class="product-list-action">
                          <div  class="product-list-action-left">
                            <a
                            id="addtocartSubSearch" data-id='.$product->product_id.'
                              class="addtocart-btn"
                              title="Add to cart"
                              href="#"
                              ><i class="ion-bag"></i> Add to cart</a
                            >
                          </div>
                          <div class="product-list-action-right">
                            <a title="Wishlist" href="#"
                              ><i class="ti-heart"></i
                            ></a>
                            <a
                              title="Quick View"
                              data-toggle=odal"
                              data-target="#exampleModal"
                              href="#"
                              ><i class="ti-plus"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ';

                }
            }
            return Response($output);

        }
    }


}
