<?php

namespace App\Events;

use App\Referral;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ReferralCompleted
{
    use Dispatchable, SerializesModels;

    protected $referral;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Referral $referral)
    {
        $this->referral = $referral;
    }

}
