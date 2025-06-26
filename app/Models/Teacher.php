<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $guarded = [];


    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function reviews()
    {
         return $this->morphMany(Review::class, 'target');
    }

}
