<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'sell_price', 'quantity', 'image', 'description'];

    public function category () {
        return $this->belongsTo('App\Models\Category');
    }
}
