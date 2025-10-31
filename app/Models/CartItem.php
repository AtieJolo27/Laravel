<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;


class CartItem extends Model
{
    protected $table='cart';
    protected $fillable = ['user_id', 'product_id', 'quantity'];
    public function product(){
        return $this->belongsTo(Products::class, 'product_id'); 
}
    
}
