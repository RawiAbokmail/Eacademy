<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];

    function getRouteKeyName()
    {
        return 'slug';
    }

    function blogs(){
        return $this->hasMany(Blog::class);
    }

    function products(){
        return $this->hasMany(Product::class);
    }

    function courses(){
        return $this->hasMany(Course::class);
    }

}