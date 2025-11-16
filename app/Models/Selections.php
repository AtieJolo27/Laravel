<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Selections extends Model
{   protected $primaryKey = 'selections_id';
    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
