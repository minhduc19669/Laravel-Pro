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


Route::get('', 'LoginController@showFormLogin')->name('login');
Route::post('login', 'LoginController@login')->name('admin.login');
Route::get('logout','LoginController@logout')->name('admin.logout');
//login
Route::middleware(['auth'])->group(function (){
    //user
    Route::prefix('users')->group(function(){

    Route::get('dashboard', 'UserController@dashboard')->name('admin.dashboard');
        Route::middleware('isAdmin:admin')->group(function(){
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
        Route::middleware('isAdmin:product')->group(function(){
            Route::get('product', 'ProductController@list')->name('product.list');
            Route::get('add-product', 'ProductController@add')->name('product.add');
            Route::post('save-product', 'ProductController@save');
            Route::get('edit-product/{id}', 'ProductController@edit')->name('product.edit');
            Route::post('update-product/{id}', 'ProductController@update');
            Route::get('remove-product/{id}', 'ProductController@remove');
            Route::get('active-product/{id}', 'ProductController@active');
            Route::get('unactive-product/{id}', 'ProductController@unactive');
        });
		//Sale-code

		Route::prefix('coupon')->group(function(){
			Route::get('list','CouponController@index')->name('coupon.list');



		});


        //Category
        Route::middleware('isAdmin:category')->group(function(){
            Route::get('category', 'CategoryController@list')->name('category.list');
            Route::get('add-category', 'CategoryController@add')->name('category.add');
            Route::post('save-category', 'CategoryController@save');
            Route::get('edit-category/{id}', 'CategoryController@edit')->name('category.edit');
            Route::post('update-category/{id}', 'CategoryController@update');
            Route::get('remove-cate/{id}', 'CategoryController@remove');
            Route::get('active-category/{id}', 'CategoryController@active');
            Route::get('unactive-category/{id}', 'CategoryController@unactive');
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
    });
            Route::get('newscategory','NewscategoryController@list')->name('newscategory.list');
            Route::get('add-newscategory','NewscategoryController@add')->name('newscategory.add');
            Route::post('save-newscategory','NewscategoryController@save');
            Route::get('edit-newscategory/{id}','NewscategoryController@edit')->name('newscategory.edit');
            Route::post('update-newscategory/{id}','NewscategoryController@update');
            Route::get('remove-newscategory/{id}','NewscategoryController@remove');
            Route::get('active-newscategory/{id}','NewscategoryController@active');
            Route::get('unactive-newscategory/{id}','NewscategoryController@unactive');
            //news
            Route::get('news','NewsController@index')->name('news.list');
            Route::get('add-news','NewsController@add')->name('news.add');
            Route::post('save-news','NewsController@save');
            Route::get('edit-news/{id}','NewsController@edit')->name('news.edit');
            Route::post('update-news/{id}','NewsController@update');
            Route::get('romove-news/{id}','NewsController@remove')->name('news.remove');
            Route::get('active-news/{id}','NewsController@active');
            Route::get('unactive-news/{id}','NewsController@unactive');
        });

});






