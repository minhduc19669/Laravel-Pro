<?php

namespace App\Providers;

use App\Category;
use App\Coupon;
use App\Product;
use App\Slide;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;






class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['pages.home','pages.cart','layout.layout','pages.checkout'], function ($view) {
            $products = Product::limit(8)->orderBy('product_id', 'desc')->get();
            $slides = Slide::limit(3)->orderBy('id', 'desc')->get();
            $category = Category::where('cate_pro_id', '!=', 'null')
            ->select('cate_pro_id', 'category_product_name', 'sub_id', 'category_sub_product_name','parent_id')
                ->with('SubCategories')
                ->get();
            $count=Cart::count();
            $data=Cart::content();
            $total = Cart::priceTotal();
            $category_news =Category::where('cate_news_id', '!=', 'null')->get();
            $view->with(['category_news'=>$category_news,'count'=>$count,'data'=>$data,'total'=>$total,'products'=>$products,'slides'=>$slides,'category'=>$category]);
        });


    }
}
