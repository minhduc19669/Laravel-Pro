<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;

=======
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Schema;

>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f

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
        Schema::defaultStringLength(191);

=======
<<<<<<< HEAD
=======
        Schema::defaultStringLength(191);

>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
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
