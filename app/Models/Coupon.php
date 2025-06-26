<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $guarded = [];

     // هل هو صالح حاليًا؟
    public function isValid()
    {
        return $this->use_times < $this->limit_use &&
               ($this->expires_at === null || $this->expires_at > now());
    }

    // احسب الخصم بناءً على المجموع
    public function calculateDiscount($total)
    {
        if ($this->type_discount === 'percent') {
            return $total * $this->amount_discount / 100;
        }

        return $this->amount_discount;
    }
}
