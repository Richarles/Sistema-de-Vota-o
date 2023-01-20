<?php

namespace App\Providers;

use App\View\Components\MenuNav;
use App\View\Components\Modal;
use App\View\Components\Validation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


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
        Blade::component('validation', Validation::class);
        Blade::component('menu-nav', MenuNav::class);
        Blade::component('modal', Modal::class);

        Paginator::useBootstrap();

    }
}
