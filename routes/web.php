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
//login


Route::prefix('home')->group(function(){
Route::get('/', 'User\HomeController@index')->name('home');
Route::get('/product', 'User\HomeController@product')->name('home.product');
    //home
Route::get('login', 'User\HomeController@showFormLogin_Register')->name('home.getlogin');
Route::post('login', 'User\HomeController@login')->name('home.postlogin');
});
Route::post('register', 'User\HomeController@register')->name('home.register');
Route::middleware(['auth'])->group(function (){
    //user
    Route::prefix('users')->group(function(){
    Route::get('dashboard', 'User\UserController@dashboard')->name('admin.dashboard');
        Route::middleware('isAdmin:admin')->group(function(){
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
        Route::middleware('isAdmin:product')->group(function(){
            Route::get('product', 'ProductController@list')->name('product.list');
            Route::get('add-product', 'ProductController@add')->name('product.add');
            Route::post('save-product', 'ProductController@save')->name('product.save');
            Route::get('edit-product/{id}', 'ProductController@edit')->name('product.edit');
            Route::post('update-product/{id}', 'ProductController@update')->name('product.update');
            Route::get('remove-product/{id}', 'ProductController@remove')->name('product.remove');
            Route::get('active-product/{id}', 'ProductController@active')->name('product.active');
            Route::get('unactive-product/{id}', 'ProductController@unactive')->name('product.active');
        });
		//Sale-code
		Route::prefix('coupon')->group(function(){
            Route::get('list','CouponController@index')->name('coupon.list');
            Route::get('create','CouponController@create')->name('coupon.create');
            Route::get('edit/{id}', 'CouponController@edit')->name('coupon.edit');
            Route::post('store', 'CouponController@store')->name('coupon.store');
            Route::post('update/{id}', 'CouponController@update')->name('coupon.update');
            Route::get('delete/{id}', 'CouponController@delete')->name('coupon.delete');
		});
        //Category
        Route::middleware('isAdmin:category')->group(function(){
            Route::get('category', 'CategoryController@list')->name('category.list');
            Route::get('add-category', 'CategoryController@add')->name('category.add');
            Route::post('save-category', 'CategoryController@save')->name('category.save');
            Route::get('edit-category/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('update-category/{id}', 'CategoryController@update')->name('category.update');
            Route::get('remove-cate/{id}', 'CategoryController@remove')->name('category.remove');

        });
                //brand
        Route::middleware('isAdmin:category')->group(function () {
            Route::get('brand', 'BrandController@list')->name('brand.list');
            Route::get('add-brand', 'BrandController@add')->name('brand.add');
            Route::post('save-brand', 'BrandController@save');
            Route::get('edit-brand/{id}', 'BrandController@edit')->name('brand.edit');
            Route::post('update-brand/{id}', 'BrandController@update');
            Route::get('remove-brand/{id}', 'BrandController@remove');
            Route::get('active-brand/{id}', 'BrandController@active');
            Route::get('unactive-brand/{id}', 'BrandController@unactive');
        });
            //news
            Route::get('news','NewsController@index')->name('news.list');
            Route::get('add-news','NewsController@add')->name('news.add');
            Route::post('save-news','NewsController@save');
            Route::get('edit-news/{id}','NewsController@edit')->name('news.edit');
            Route::post('update-news/{id}','NewsController@update')->name('news.update');
            Route::get('romove-news/{id}','NewsController@remove')->name('news.remove');
            Route::get('active-news/{id}','NewsController@active');
            Route::get('unactive-news/{id}','NewsController@unactive');
            //slide
            Route::get('slide','SlideController@list')->name('slide.list');
            Route::get('add-slide','SlideController@add')->name('slide.add');
            Route::post('save-slide','SlideController@save')->name('slide.save');
            Route::get('add-slide','SlideController@add')->name('slide.add');
            Route::get('edit-slide/{id}','SlideController@edit')->name('slide.edit');
            Route::post('update-slide/{id}','SlideController@update')->name('slide.update');
            Route::get('remove-slide/{id}','SlideController@remove')->name('slide.remove');
            Route::get('active-slide/{id}','SlideController@active')->name('slide.active');
            Route::get('unactive-slide/{id}','SlideController@unactive')->name('slide.unactive');
             //order
              Route::get('order','OrderController@list')->name('order.list');
              Route::get('add-order','OrderController@add')->name('order.add');
              Route::post('save-order','OrderController@save')->name('order.save');
              Route::get('edit-order/{id}','OrderController@edit')->name('order.edit');
              Route::post('update-order/{id}','OrderController@update')->name('order.update');
              Route::get('remove-order/{id}','OrderController@remove')->name('order.remove');
              //custom
            Route::get('custom', 'CustomerController@list')->name('custom.list');
            Route::get('add-custom', 'CustomerController@add')->name('custom.add');
            Route::post('save-custom', 'CustomerController@save')->name('custom.save');
            Route::get('edit-custom/{id}', 'CustomerController@edit')->name('custom.edit');
            Route::post('update-custom/{id}', 'CustomerController@update')->name('custom.update');
            Route::get('remove-custom/{id}','CustomerController@remove')->name('custom.remove');

        });
    });




