<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class SendReferralAgainRule implements Rule
{
    protected $user;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->user->referrals->contains('user_email', $value))
            return false;

        return true;    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have already send referral to this person';
    }
}
