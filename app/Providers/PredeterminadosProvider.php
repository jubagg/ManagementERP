<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PredeterminadosProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/PredeterminadosHelper.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
