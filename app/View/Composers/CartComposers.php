<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComposers
{
    public function compose(View $view)
    {
        $cartItems = [];

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $cartItems = CartItem::with('product')
                    ->where('cart_id', $cart->id)
                    ->get();
            }
        }

        $view->with('cartItems', $cartItems);
    }
}
