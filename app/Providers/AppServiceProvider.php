<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Schema;

>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
<<<<<<< HEAD
=======
        Schema::defaultStringLength(191);

>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
