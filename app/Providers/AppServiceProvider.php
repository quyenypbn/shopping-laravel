<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Cart;
use Session;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()-> composer('sub.client.header',function($view){
            $loai_sp= ProductType::all();
         
            $view -> with('loai_sp', $loai_sp);
        });

        view()->composer(['sub.client.header','page.dat-hang','sub.client.danh-muc-trai'], function($view){
            if(Cart::content()){
                $Cart = Cart::content();
               
                $view -> with(['cart' => $Cart, 'product_cart'=> $Cart, 'totalPrice'=>Cart::total(), 'totalQty'=>Cart::count()]);
            }
        });
         Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^(01[2689]|09|08)[0-9]{8}$/',$value);
        });
    }

    /**, 
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
   
}
