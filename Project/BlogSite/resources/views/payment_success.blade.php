@extends('component.home')
@section('title', 'Payment Success')
@section('main-section')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4 text-center" style="max-width: 500px; width: 100%;">
            <div class="card-body">
                <h3 class="card-title mb-3 text-success">Payment Successful!</h3>
                <p class="card-text">Thank you for your payment. Your subscription is now active.</p>
                <ul class="list-group list-group-flush text-start mb-3">
                    <li class="list-group-item"><strong>Transaction ID:</strong> {{ $pid ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Amount Paid:</strong> NPR {{ $amount ?? '0.00' }}</li>
                </ul>
                <a href="{{ route('dashboard') }}" class="btn btn-success mt-2">Go to Dashboard</a>
            </div>
        </div>
    </div>
@endsection