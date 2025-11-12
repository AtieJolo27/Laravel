<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'productName',
            'productDescription',
            'productCategory',
            'productPrice',
            'productImage',
            'productStock'

    ];
    public function selections() {
        return $this->hasMany(Selections::class, 'product_id');
    }
    
}