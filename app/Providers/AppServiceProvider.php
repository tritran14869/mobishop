<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Session;
use App\ProductType;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function($view) {
            $p_type = ProductType::all();
            $feature = array('van-tay', 'chong-nuoc', '4g', '2-sim');

            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 
                         'product_cart'=>$cart->items,
                         'totalPrice'=>$cart->totalPrice,
                         'totalQty'=>$cart->totalQty]);
            }

            $view->with('feature', $feature);
            $view->with('p_type', $p_type);            
        });

        // Create a custom Validation
        Validator::extend('notAdmin', function($attribute, $value, $parameters)
        {
            // Banned words
            $words = array('admin', 'Admin', 'ADMIN', '@dmin');
            foreach ($words as $word)
            {
                if (stripos($value, $word) !== false) return false;
            }
            return true;
        });

        // Create a msg string for a custom validation
        Validator::replacer('notAdmin', function ($message, $attribute, $rule, $parameters) {
            return 'Không thể chứa từ khoá admin';
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
