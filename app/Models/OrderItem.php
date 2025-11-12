<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Products::class);
    }

    public function portion() {
        return $this->belongsTo(Selections::class);
    }

    public function addons() {
        return $this->hasMany(OrderItemAddons::class);
    }
}
