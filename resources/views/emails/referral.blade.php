@component('mail::message')
{{ $sender->name }} has invented you to Referral System

Join now to get 50% off

@component('mail::button', ['url' =>  route('register', ['referral' => $referral->token])])
Join
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
