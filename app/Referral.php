<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeWhereNotCompleted(Builder $builder)
    {
        return $builder->where('completed', false);
    }

    public function scopeWhereNotFromUser(Builder $builder, ?User $user)
    {
        if (!$user) {
            return $builder;
        }

        return $builder->where('user_id', '!=', $user->id);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
