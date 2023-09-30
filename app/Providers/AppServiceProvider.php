<?php

namespace App\Providers;

use App\Models\ProductCart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer('*',function($view){
            $cart_count = ProductCart::where('user_id', auth()->id())->count();
            $view->with('cart_count', $cart_count);
        });
    }
}
