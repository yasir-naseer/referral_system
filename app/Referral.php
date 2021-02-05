<?php

namespace App;

use Illuminate\Support\Str;
use App\Events\ReferralCompleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Referral extends Model
{
    protected $guarded = [];

    protected $dates = [
        'completed_at'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function(Referral $referral) {
            $referral->token = Str::random(50);
        });
    }

    public function scopeWhereNotCompleted(Builder $builder) {
        return $builder->where('completed', false);
    }

    public function scopeWhereNotFromUser(Builder $builder, ?User $user)
    {

        if($user) {
            return $builder->where('user_id', '!=', $user->id);
        }

        return $builder;
    }

    public function complete() {
        $this->update([
            'completed' => true,
            'completed_at' => now()
        ]);

        event(new ReferralCompleted($this));
    }
}
