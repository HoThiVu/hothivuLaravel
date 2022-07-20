<?php

namespace App\Providers;
use App\Models\ProductType;
use App\Models\Cart;
// use App\Providers\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        
        // Paginator::useBootstrap();
        View::composer(['layout.header','banhang.product_type'],function($view){
            $pro_types=ProductType::all();
            $view->with(compact('pro_types'));
        });

        View::composer(['layout.header','banhang.checkout'],function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart'); //session cart được tạo trong method addToCart của PageController
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'productCarts'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

    }
}
