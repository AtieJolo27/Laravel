<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItemAddons extends Model
{
    public function cartItem() {
        return $this->belongsTo(CartItem::class);
    }

    public function addon() {
        return $this->belongsTo(Addons::class);
    }
}
