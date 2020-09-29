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
            Route::get('list','UserController@index')->middleware('isAdmin:user-list')->name('user.list');
            Route::get('add','UserController@create')->middleware('isAdmin:user-add')->name('user.create');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{id}', 'UserController@edit')->middleware('isAdmin:user-edit')->name('user.edit');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::post('change','UserController@changeRole')->name('user.changeRole');
            Route::post('upload/{id}','UserController@uploadCover')->name('user.upload');
            Route::get('delete/{id}','UserController@delete')->middleware('isAdmin:user-delete')->name('user.delete');
            //Role
            Route::prefix('role')->group(function(){
                Route::get('list','RoleController@index')->middleware('isAdmin:role-list')->name('role.index');
            Route::get('create', 'RoleController@create')->middleware('isAdmin:role-add')->name('role.create');
            Route::get('edit/{id}', 'RoleController@edit')->middleware('isAdmin:role-edit')->name('role.edit');
            Route::post('update/{id}', 'RoleController@update')->name('role.update');
            Route::post('store', 'RoleController@store')->name('role.store');
            Route::get('delete/{id}', 'RoleController@delete')->name('role.delete');
            });
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
            //newscategory
            Route::get('newscategory','NewscategoryController@list')->name('newscategory.list');
            Route::get('add-newscategory','NewscategoryController@add')->name('newscategory.add');
            Route::post('save-newscategory','NewscategoryController@save');
            Route::get('edit-newscategory/{id}','NewscategoryController@edit')->name('newscategory.edit');
            Route::post('update-newscategory/{id}','NewscategoryController@update');

        });
});






