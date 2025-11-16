@extends('layout.super')

@section('content')
    <div class="container py-5">
        <h1>eSewa Payment Page</h1>
        <p>This is a placeholder for the eSewa payment integration.</p>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('payment.subscription') }}" method="POST">
                        @csrf
                        <input type="hidden" name="amount" value="500" />
                        <input type="hidden" name="pid" value="{{ uniqid() }}" />
                        <button type="submit" class="btn btn-primary w-100">
                            Pay NPR {{ number_format(500 + 10, 2) }} with eSewa
                        </button>
                </div>
            </div>
        </div>
    </div>
@endsection