@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscription</div>

                <div class="card-body">
                   <form action="{{ route('subscriptions.store') }}" method="POST">
                    @csrf
                    <button class="btn btn-success">Make Payment</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
