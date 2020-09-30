<?php

namespace App\Providers;

use App\Coupon;
use Illuminate\Support\ServiceProvider;

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

        view()->composer('admin_layout', function ($view) {
            $coupon_total = Coupon::all();
            $count=\count($coupon_total);
            $view->with(['count'=>$count]);
        });
    }
}
