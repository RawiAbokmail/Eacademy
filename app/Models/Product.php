<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

     public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    function Categories(){
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'target');
    }

    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }
}
