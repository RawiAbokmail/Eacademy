<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $guarded = [];

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
}