<?php

namespace App\Providers;

use App\Models\cart_product;
use App\Models\category;
use App\Models\favorite;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {

            $categories = category::all();

            if (auth()->check()) {
                $cart_user = cart_product::whereHas('cart', function ($q) {
                    $q->where('user_id', auth()->id());
                })->count();
                $fav = favorite::where('user_id', auth()->id())->get();
            } else {
                $cart_user = 0;
                $fav = 0;
            }

            $view->with([
                'cart_user' => $cart_user,
                'fav' => $fav,
                'categories' => $categories,
            ]);
        });
    }
}
