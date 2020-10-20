<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SucursalesProvider extends ServiceProvider
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
        require_once app_path() . '/Helpers/SucursalHelper.php';
    }
}
