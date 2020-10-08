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

Route::get('', 'User\LoginController@showFormLogin')->name('login');
Route::post('login', 'User\LoginController@login')->name('admin.login');
Route::get('logout', 'User\LoginController@logout')->name('admin.logout');
//login-admin



Route::prefix('home')->group(function(){
    Route::get('/', 'User\HomeController@index')->name('home');
    Route::get('/product', 'User\HomeController@product')->name('home.product');
    //home-customer-login
    Route::get('login', 'User\HomeController@showFormLogin')->name('home.getlogin');
    Route::get('register', 'User\HomeController@showFormRegister')->name('home.getregister');
    Route::post('login', 'User\HomeController@login')->name('home.postlogin');
    Route::post('register', 'User\HomeController@register')->name('home.postregister');
    //customer
    Route::get('customer', 'Admin\CustomerController@list')->name('customer.list');
    Route::get('add-customer', 'Admin\CustomerController@add')->name('customer.add');
    Route::post('save-customer', 'Admin\CustomerController@save')->name('customer.save');
    Route::get('edit-customer/{id}', 'Admin\CustomerController@edit')->name('customer.edit');
    Route::post('update-customer/{id}', 'Admin\CustomerController@update')->name('customer.update');
    Route::get('remove-customer/{id}', 'Admin\CustomerController@remove')->name('customer.remove');
});
//social-login
Route::get('auth/google', 'User\SocialController@redirectToGoogle')->name('google');
Route::get('auth/google/callback', 'User\SocialController@handleGoogleCallback');
Route::get('auth/google/logout', 'User\SocialController@logout')->name('google_logout');

//cart
Route::prefix('cart')->group(function(){
    Route::get('add/{id}', 'CartController@addCart');
    Route::get('quick-view/{id}','CartController@quick_view_product');
    Route::get('delete/{id}', 'CartController@delete');
});



//manage//


Route::middleware(['auth'])->group(function (){
    //user
    Route::prefix('users')->group(function () {
        Route::get('dashboard', 'User\UserController@dashboard')->name('admin.dashboard');
        Route::middleware('isAdmin:admin')->group(function () {
            Route::get('list', 'User\UserController@index')->name('user.list');
            Route::get('add', 'User\UserController@create')->name('user.create');
            Route::post('store', 'User\UserController@store')->name('user.store');
            Route::get('edit/{id}', 'User\UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'User\UserController@update')->name('user.update');
            Route::post('change', 'User\UserController@changeRole')->name('user.changeRole');
            Route::post('upload/{id}', 'User\UserController@uploadCover')->name('user.upload');
            Route::get('delete/{id}', 'User\UserController@delete')->name('user.delete');
            //Role
            Route::prefix('role')->group(function () {
                Route::get('list', 'User\RoleController@index')->name('role.index');
                Route::get('create', 'User\RoleController@create')->name('role.create');
                Route::get('edit/{id}', 'User\RoleController@edit')->name('role.edit');
                Route::post('update/{id}', 'User\RoleController@update')->name('role.update');
                Route::post('store', 'User\RoleController@store')->name('role.store');
                Route::get('delete/{id}', 'User\RoleController@delete')->name('role.delete');
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
            //news
            Route::get('category/news', 'CategoryController@list_news')->name('category.list-news');
            Route::get('category/news/add', 'CategoryController@add_news')->name('category.add-news');
            Route::post('category/news/save', 'CategoryController@save_news')->name('category.save-news');
            Route::get('category/news/edit/{id}', 'CategoryController@edit_news')->name('category.edit-news');
            Route::post('category/news/update/{id}', 'CategoryController@update_news')->name('category.update-news');
            Route::get('category/news/remove/{id}', 'CategoryController@remove_news')->name('category.remove-news');
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




