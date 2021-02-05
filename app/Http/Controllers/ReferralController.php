<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\SendReferralAgainRule;
use Illuminate\Support\Facades\Mail;
use App\Mail\Referrals\ReferralEmail;
use App\Rules\SendReferralToSelfRule;
use App\Http\Requests\Referrals\CreateReferralRequest;

class ReferralController extends Controller
{
    public function index(Request $request) 
    {
        $referrals = $request->user()->referrals()->orderBy('completed','DESC')->get();

        return view('referrals.index', compact('referrals'));
    }

    public function store(CreateReferralRequest $request) {

        $referral = $request->user()->referrals()->create($request->only('user_email'));

        Mail::to($referral->user_email)->send(new ReferralEmail($request->user(), $referral));
        return redirect()->back();
    }

}
