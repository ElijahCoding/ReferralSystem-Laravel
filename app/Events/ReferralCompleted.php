<?php

namespace App\Events;

use App\Referral;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

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
