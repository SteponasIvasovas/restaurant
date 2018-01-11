<?php

namespace App\Providers;

use App\Menu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //nurodom kad kintamasis menus visada butu aptinkamas layouts.app
        view()->composer('layouts.app', function($view) {
          $menus = \App\Menu::all();
          $view->with(compact('menus'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
