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


    //home-customer-login
    Route::get('login', 'HomeController@showFormLogin')->name('home.getlogin');
    Route::get('register', 'HomeController@showFormRegister')->name('home.getregister');
    Route::post('login', 'HomeController@login')->name('home.postlogin');
    Route::post('register', 'HomeController@register')->name('home.postregister');
    Route::get('forgot/password', 'ForgotPasswordController@index')->name('forgot_password');
    Route::post('forgot/password', 'ForgotPasswordController@sendCodeResetPassword')->name('check.email');
    Route::get('sent/mail','ForgotPasswordController@alert')->name('email.alert');
    Route::get('reset/password/{email}/{code}','ForgotPasswordController@reset_password');
    Route::post('save/password', 'ForgotPasswordController@save_change_password_reset')->name('save.password');


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

    //blog
    Route::get('blog', 'PageController@showBlog')->name('page.blog');
    Route::get('blog/details/{id}','PageController@blogDetails' )->name('page.blogDetails');
    Route::get('blog/category/{id}','PageController@blogCategory')->name('page.blogCategory');
    //about
    Route::get('about','PageController@about')->name('page.about');
    //contact
    Route::get('contact','PageController@contact')->name('page.contact');
    Route::get('account/{id}', 'PageController@account')->name('page.account');

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
    Route::post('order/Admin', 'CheckoutAdminController@confirm_order')->name('cart.infoorderAdmin');
    Route::get('district/{id}', 'DistrictController@showDistrictInCity');
    Route::get('transportFee/{id}', 'TransportController@showTransportInCityInDistrict');
    // Route::get('info', 'CheckoutController@alert_checkout')->name('cart.info_order');
    Route::get('addproductqty/{id}/{qty}', 'CartController@add_product_folow_quantity');
});
//page
Route::prefix('page')->group(function(){
    //product
    Route::get('product', 'PageController@allProduct')->name('page.index');
    Route::get('product/details/{id}', 'PageController@productDetail')->name('page.detail_product');
    Route::get('product/category/{id}','PageController@productCategory')->name('page.product_category');
    Route::get('product/subcategory/{id}','PageController@productSubcategory')->name('page.product_subcategory');
    Route::get('product/brand/{id}','PageController@productBrand')->name('page.product_brand');
    Route::get('product/search','PageController@search')->name('page.product_search');
    Route::get('product/search/ajax','PageController@searchAjax')->name('page.product_searchAjax');

});

Route::post('post', 'PostController@post')->name('customer.rating');

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
            //phantrang
            Route::get('Pagination','ProductController@pagination')->name('product.pagination');
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
            Route::get('category/subcategory/search_sub','CategoryController@action_sub')->name('category.search_sub');
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
            Route::get('brand/search','BrandController@action')->name('brand.search');

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
            Route::get('news/search','NewsController@action')->name('news.search');
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
              Route::get('order/search','OrderController@action')->name('order.search');
              Route::get('order/product/{id}', 'OrderController@showPrice');
              Route::get('order/cart/{id}','OrderController@cart');

        //customer
            Route::get('customer', 'CustomerController@list')->name('customer.list');
            Route::get('customer/add', 'CustomerController@add')->name('customer.add');
            Route::post('customer/save', 'CustomerController@save')->name('customer.save');
            Route::get('customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
            Route::post('customer/update/{id}', 'CustomerController@update')->name('customer.update');
            Route::get('customer/remove{id}','CustomerController@remove')->name('customer.remove');
            Route::get('customer/search','CustomerController@action')->name('customer.search');
        //shipping
            Route::get("shipping","ShippingController@list")->name('shipping.list');
            Route::get("shipping/add","ShippingController@add")->name('shipping.add');
            Route::post("shipping/save","ShippingController@save")->name('shipping.save');
            Route::get("shipping/edit/{id}","ShippingController@edit")->name('shipping.edit');
            Route::post("shipping/update/{id}","ShippingController@update")->name('shipping.update');
            Route::get("shipping/remove/{id}","ShippingController@remove")->name('shipping.remove');
            Route::get('shipping/search/action','ShippingController@action')->name('shipping.search');
            Route::get('shipping/search/action_1','ShippingController@action_1')->name('shipping.search_1');
        //Comment
            Route::get('comment','PostController@list')->name('comment.list');
            Route::get('comment/search/action','PostController@action')->name('comment.search');
            Route::get('comment/edit/{id}','PostController@edit')->name('comment.edit');
            Route::get('comment/delete/{id}','PostController@delete')->name('comment.delete');
        //transport
            Route::get('transport','TransportController@list')->name('transport.list');
            Route::get('transport/add','TransportController@add')->name('transport.add');
            Route::post('transport/save','TransportController@save')->name('transport.save');
            Route::get('transport/edit/{id}','TransportController@edit')->name('transport.edit');
            Route::post('transport/update/{id}','TransportController@update')->name('transport.update');
            Route::get('transport/search/action','TransportController@action')->name('transport.search');
            Route::get('transport/delete/{id}','TransportController@delete')->name('transport.delete');
            //feedback
            Route::post('feedback/save','FeedbackController@save')->name('feedback.save');
            Route::get('feedback','FeedbackController@list')->name('feedback.list');
            Route::get('feedback/edit/{id}','FeedbackController@edit')->name('feedback.edit');
            Route::get('feedback/search','FeedbackController@search')->name('feedback.search');
            Route::get('feedback/delete/{id}','FeedbackController@delete')->name('feedback.delete');
            Route::post('feedback/update/{id}','FeedbackController@update')->name('feedback.update');
            Route::post('feedback/addSale','FeedbackController@addSale')->name('feedback.addSale');




    });
    });




