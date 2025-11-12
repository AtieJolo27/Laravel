<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
    ];
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
public $incrementing = true;
    public function User()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'cart_id');
    }
}
