<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
