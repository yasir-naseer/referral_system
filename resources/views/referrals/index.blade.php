@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">{{ __('Referrals') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Completed</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if(count($referrals))
                                @foreach($referrals as $ref)
                                    <tr>
                                        <td>{{ $ref->user_email}}</td>
                                        <td>{{ $ref->created_at->toDateString()}}</td>
                                        <td>
                                            @if(!$ref->completed)
                                                No &nbsp; <a href="{{ route('index', ['referral'=> $ref->token]) }}">Get Link</a>
                                            @else
                                                Yes
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                           @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card">
                <div class="card-header">{{ __('Send Referral') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('referrals.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('user_email') is-invalid @enderror" name="user_email" value="{{ old('user_email') }}"  autofocus>

                                @error('user_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Referral
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
