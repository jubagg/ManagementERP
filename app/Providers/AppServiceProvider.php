<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MgMenu;
use App\Generales;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with('menus', Mgmenu::menus());
        });

        view()->composer('*', function($view){
            $view->with('generales', Generales::paginas());
        });
    }
}
