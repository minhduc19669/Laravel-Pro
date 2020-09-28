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
        Route::prefix('users')->group(function(){
            //user
            Route::get('dashboard','UserController@dashboard')->name('admin.dashboard');
            Route::get('list','UserController@index')->name('user.list');
            Route::get('add','UserController@create')->name('user.create');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::post('change','UserController@changeRole')->name('user.changeRole');
            Route::post('upload/{id}','UserController@uploadCover')->name('user.upload');
            Route::get('delete/{id}','UserController@delete')->name('user.delete');
            // Route::post('updateRole/{id}')
        //product
        Route::get('product','ProductController@list')->name('product.list');
        Route::get('add-product','ProductController@add')->name('product.add');
        Route::post('save-product','ProductController@save');
        Route::get('edit-product/{id}','ProductController@edit')->name('product.edit');
        Route::post('update-product/{id}','ProductController@update');
        Route::get('remove-product/{id}','ProductController@remove');
        Route::get('active-product/{id}','ProductController@active');
        Route::get('unactive-product/{id}','ProductController@unactive');
        //Category
        Route::get('category','CategoryController@list')->name('category.list');
        Route::get('add-category','CategoryController@add')->name('category.add');
        Route::post('save-category','CategoryController@save');
        Route::get('edit-category/{id}','CategoryController@edit')->name('category.edit');
        Route::post('update-category/{id}','CategoryController@update');
        Route::get('remove-cate/{id}','CategoryController@remove');
        Route::get('active-category/{id}','CategoryController@active');
        Route::get('unactive-category/{id}','CategoryController@unactive');

         //brand
        Route::get('brand','BrandController@list')->name('brand.list');
        Route::get('add-brand','BrandController@add')->name('brand.add');
        Route::post('save-brand','BrandController@save');
        Route::get('edit-brand/{id}','BrandController@edit')->name('brand.edit');
        Route::post('update-brand/{id}','BrandController@update');
        Route::get('remove-brand/{id}','BrandController@remove');
        Route::get('active-brand/{id}','BrandController@active');
        Route::get('unactive-brand/{id}','BrandController@unactive');
    });
});






