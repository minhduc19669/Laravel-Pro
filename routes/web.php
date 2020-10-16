<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin', 'LoginController@showFormLogin')->name('login');
Route::post('login', 'LoginController@login')->name('admin.login');
Route::get('logout', 'LoginController@logout')->name('admin.logout');
//login-admin



Route::prefix('home')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/product', 'HomeController@product')->name('home.product');
    //home-customer-login
    Route::get('login', 'HomeController@showFormLogin')->name('home.getlogin');
    Route::get('register', 'HomeController@showFormRegister')->name('home.getregister');
    Route::post('login', 'HomeController@login')->name('home.postlogin');
    Route::post('register', 'HomeController@register')->name('home.postregister');
    //customer
    Route::get('customer', 'CustomerController@list')->name('customer.list');
    Route::get('add-customer', 'CustomerController@add')->name('customer.add');
    Route::post('save-customer', 'CustomerController@save')->name('customer.save');
    Route::get('edit-customer/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::post('update-customer/{id}', 'CustomerController@update')->name('customer.update');
    Route::get('remove-customer/{id}', 'CustomerController@remove')->name('customer.remove');
    //product
    Route::get('product', 'PageController@allProduct')->name('home.allProduct');
    Route::get('product/details/{id}','PageController@productDetail')->name('product.details');

});
//social-login
Route::get('auth/google', 'SocialController@redirectToGoogle')->name('google');
Route::get('auth/google/callback', 'SocialController@handleGoogleCallback');
Route::get('auth/google/logout', 'SocialController@logout')->name('google_logout');

//cart
Route::prefix('cart')->group(function(){
    Route::get('add/{id}', 'CartController@addCart');
    Route::get('quick-view/{id}','CartController@quick_view_product');
    Route::get('delete/{id}', 'CartController@delete');
    Route::get('view','CartController@index')->name('cart.view');
    Route::get('update/{id}/{qty}','CartController@update')->name('cart.update');
    Route::get('delete-all', 'CartController@delete_all_cart')->name('delete-all');
    Route::get('checkout','CartController@checkout')->name('cart.checkout');
    Route::get('shipping','CheckoutController@shipping')->name('cart.shipping');
    Route::post('order', 'CheckoutController@confirm_order')->name('cart.infoorder');
    Route::get('district/{id}', 'DistrictController@showDistrictInCity');
    // Route::get('info', 'CheckoutController@alert_checkout')->name('cart.info_order');
});
//page
Route::prefix('page')->group(function(){
    Route::get('product', 'PageController@allProduct')->name('page.index');
    Route::get('product/details/{id}', 'PageController@productDetail')->name('page.detail_product');
});









//manager//
Route::middleware(['auth'])->group(function (){
    //user
    Route::prefix('users')->group(function () {
        Route::get('dashboard', 'UserController@dashboard')->name('admin.dashboard');
        Route::middleware('isAdmin:admin')->group(function () {
            Route::get('list', 'UserController@index')->name('user.list');
            Route::get('add', 'UserController@create')->name('user.create');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::post('change', 'UserController@changeRole')->name('user.changeRole');
            Route::post('upload/{id}', 'UserController@uploadCover')->name('user.upload');
            Route::get('delete/{id}', 'UserController@delete')->name('user.delete');
            //Role
            Route::prefix('role')->group(function () {
                Route::get('list', 'RoleController@index')->name('role.index');
                Route::get('create', 'RoleController@create')->name('role.create');
                Route::get('edit/{id}', 'RoleController@edit')->name('role.edit');
                Route::post('update/{id}', 'RoleController@update')->name('role.update');
                Route::post('store', 'RoleController@store')->name('role.store');
                Route::get('delete/{id}', 'RoleController@delete')->name('role.delete');
            });
        });
        //product
        Route::middleware('isAdmin:product')->group(function () {
            Route::get('product', 'ProductController@list')->name('product.list');
            Route::get('product/add', 'ProductController@add')->name('product.add');
            Route::post('product/save', 'ProductController@save')->name('product.save');
            Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
            Route::post('product/update/{id}', 'ProductController@update')->name('product.update');
            Route::get('product/remove/{id}', 'ProductController@remove')->name('product.remove');
            Route::get('product/active{id}', 'ProductController@active')->name('product.active');
            Route::get('product/un-active/{id}', 'ProductController@unactive')->name('product.un-active');
            Route::get('product/search','ProductController@action')->name('product.search');

        });
        //Sale-code
        Route::prefix('coupon')->group(function () {
            Route::get('list', 'CouponController@index')->name('coupon.list');
            Route::get('create', 'CouponController@create')->name('coupon.create');
            Route::get('edit/{id}', 'CouponController@edit')->name('coupon.edit');
            Route::post('store', 'CouponController@store')->name('coupon.store');
            Route::post('update/{id}', 'CouponController@update')->name('coupon.update');
            Route::get('delete/{id}', 'CouponController@delete')->name('coupon.delete');
        });
        //Category
        Route::middleware('isAdmin:category')->group(function () {
            //product
            Route::get('category/product', 'CategoryController@list')->name('category.list');
            Route::get('category/product/add', 'CategoryController@add')->name('category.add');
            Route::post('category/product/save', 'CategoryController@save')->name('category.save');
            Route::get('category/product/edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('category/product/update/{id}', 'CategoryController@update')->name('category.update');
            Route::get('category/product/remove/{id}', 'CategoryController@remove')->name('category.remove');
            Route::get('slide/search/search_pro','CategoryController@action_pro')->name('category.search_pro');
            //news
            Route::get('category/news', 'CategoryController@list_news')->name('category.list-news');
            Route::get('category/news/add', 'CategoryController@add_news')->name('category.add-news');
            Route::post('category/news/save', 'CategoryController@save_news')->name('category.save-news');
            Route::get('category/news/edit/{id}', 'CategoryController@edit_news')->name('category.edit-news');
            Route::post('category/news/update/{id}', 'CategoryController@update_news')->name('category.update-news');
            Route::get('category/news/remove/{id}', 'CategoryController@remove_news')->name('category.remove-news');
            Route::get('slide/search/search_news','CategoryController@action_news')->name('category.search_news');
            //subcategory
            Route::get('category/subcategory', 'CategoryController@list_sub')->name('subcategory.list');
            Route::get('category/subcategory/add', 'CategoryController@add_sub')->name('subcategory.add');
            Route::post('category/subcategory/save', 'CategoryController@save_sub')->name('subcategory.save');
            Route::get('category/subcategory/edit/{id}', 'CategoryController@edit_sub')->name('subcategory.edit');
            Route::post('category/subcategory/update/{id}', 'CategoryController@update_sub')->name('subcategory.update');
            Route::get('category/subcategory/remove/{id}', 'CategoryController@remove_sub')->name('subcategory.remove');
            Route::get('slide/search/search_sub','CategoryController@action_sub')->name('category.search_sub');
        });
        //brand
        Route::middleware('isAdmin:category')->group(function () {
            Route::get('brand', 'BrandController@list')->name('brand.list');
            Route::get('brand/add', 'BrandController@add')->name('brand.add');
            Route::post('brand/save', 'BrandController@save')->name('brand.save');
            Route::get('brand/edit/{id}', 'BrandController@edit')->name('brand.edit');
            Route::post('brand/update/{id}', 'BrandController@update')->name('brand.update');
            Route::get('brand/remove/{id}', 'BrandController@remove')->name('brand.remove');
            Route::get('brand/active/{id}', 'BrandController@active')->name('brand.active');
            Route::get('brand/un-active/{id}', 'BrandController@unactive')->name('brand.un-active');
        });

            //news
            Route::get('news','NewsController@index')->name('news.list');
            Route::get('news/add','NewsController@add')->name('news.add');
            Route::post('news/save','NewsController@save')->name('news.save');
            Route::get('news/edit/{id}','NewsController@edit')->name('news.edit');
            Route::post('news/update/{id}','NewsController@update')->name('news.update');
            Route::get('news/remove/{id}','NewsController@remove')->name('news.remove');
            Route::get('news/active/{id}','NewsController@active')->name('news.active');
            Route::get('news/un-active/{id}','NewsController@unactive')->name('news.un-active');
            //slide
            Route::get('slide','SlideController@list')->name('slide.list');
            Route::get('slide/add','SlideController@add')->name('slide.add');
            Route::post('slide/save','SlideController@save')->name('slide.save');
            Route::get('slide/add','SlideController@add')->name('slide.add');
            Route::get('slide/edit/{id}','SlideController@edit')->name('slide.edit');
            Route::post('slide/update/{id}','SlideController@update')->name('slide.update');
            Route::get('slide/remove/{id}','SlideController@remove')->name('slide.remove');
            Route::get('slide/active/{id}','SlideController@active')->name('slide.active');
            Route::get('slide/un-active/{id}','SlideController@unactive')->name('slide.unactive');

            Route::get('slide/search/','SlideController@search')->name('slide.search');
            Route::get('slide/search/action','SlideController@action')->name('slide.action');

        //order
              Route::get('order','OrderController@list')->name('order.list');
              Route::get('order/add','OrderController@add')->name('order.add');
              Route::post('order/save','OrderController@save')->name('order.save');
              Route::get('order/edit/{id}','OrderController@edit')->name('order.edit');
              Route::post('order/update/{id}','OrderController@update')->name('order.update');
              Route::get('order/remove/{id}','OrderController@remove')->name('order.remove');
              //customer
            Route::get('customer', 'Admin\CustomerController@list')->name('customer.list');
            Route::get('customer/add', 'Admin\CustomerController@add')->name('customer.add');
            Route::post('customer/save', 'Admin\CustomerController@save')->name('customer.save');
            Route::get('customer/edit/{id}', 'Admin\CustomerController@edit')->name('customer.edit');
            Route::post('customer/update/{id}', 'Admin\CustomerController@update')->name('customer.update');
            Route::get('customer/remove{id}','Admin\CustomerController@remove')->name('customer.remove');
              //shipping
            Route::get("shipping","ShippingController@list")->name('shipping.list');
            Route::get("shipping/add","ShippingController@add")->name('shipping.add');
            Route::post("shipping/save","ShippingController@save")->name('shipping.save');
            Route::get("shipping/edit/{id}","ShippingController@edit")->name('shipping.edit');
            Route::post("shipping/update/{id}","ShippingController@update")->name('shipping.update');
            Route::get("shipping/remove/{id}","ShippingController@remove")->name('shipping.remove');
    });
    });




