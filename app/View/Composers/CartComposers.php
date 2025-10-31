<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartComposers
{
    public function compose(View $view)
    {
        $cartItems = [];

        if (Auth::check()) {
            $cartItems = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();
        }

        $view->with('cartItems', $cartItems);
    }
}
