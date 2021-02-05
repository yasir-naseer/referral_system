<?php

namespace App\Http\Requests\Referrals;

use App\Rules\SendReferralAgainRule;
use App\Rules\SendReferralToSelfRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateReferralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_email' => [
                'required',
                'email',
                new SendReferralAgainRule($this->user()),
                new SendReferralToSelfRule($this->user()),
            ]
        ];
    }
}
