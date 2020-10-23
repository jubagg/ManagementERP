<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EstacionesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path() . '/Helpers/EstacionesHelper.php';
    }
}
