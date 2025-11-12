<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemAddons extends Model
{
    public function orderItem() {
        return $this->belongsTo(OrderItem::class);
    }

    public function addon() {
        return $this->belongsTo(Addons::class);
    }
}
