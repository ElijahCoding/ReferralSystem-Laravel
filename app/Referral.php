<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Referral extends Model
{
    protected $guarded = [];

    protected $dates = [
        'completed_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Referral $referral) {
            $referral->token = Str::random(50);
        });
    }
}
