<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;


class CartItem extends Model
{
    protected $table='cart_items';
protected $fillable = ['cart_id', 'product_id', 'selections_id', 'quantity', 'price'];
    public function product(){
        return $this->belongsTo(Products::class, 'product_id'); 
}
public function cart() {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function selections() {
        return $this->belongsTo(Selections::class, 'selections_id');
    }

    public function addons() {
        return $this->hasMany(CartItemAddons::class);
    }
    
}
