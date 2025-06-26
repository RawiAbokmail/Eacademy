<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $guarded = [];

    public function reviews()
    {
        return $this->morphMany(Review::class, 'target');
    }

    

}