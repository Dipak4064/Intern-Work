@extends('component.home')
@section('title', 'Payment Failed')
@section('main-section')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4 text-center" style="max-width: 500px; width: 100%;">
            <div class="card-body">
                <h3 class="card-title mb-3 text-danger">Payment Failed!</h3>
                <p class="card-text">Unfortunately, your payment could not be processed. Please try again.</p>

                <!-- Transaction Details (optional) -->
                <ul class="list-group list-group-flush text-start mb-3">
                    <li class="list-group-item"><strong>Transaction ID:</strong> {{ $pid ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Amount:</strong> NPR {{ $amount ?? '0.00' }}</li>
                </ul>

                <div class="d-flex justify-content-center gap-2">
                    <form action="{{ route('payment.retry') }}" method="post">
                        @csrf
                        <input type="hidden" name="plan" value="month">
                        <input type="hidden" name="amount" value="200">
                        <input type="hidden" name="pid" value="{{ time() }}">
                        <button class="btn btn-danger mt-2" type="submit">Pay Again</button>
                    </form>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-2">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection