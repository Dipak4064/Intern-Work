@extends('component.home')
@section('title', 'New User Registration')

@section('main-section')
    <script src="https://www.google.com/recaptcha/api.js"></script>
        <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
            <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px; border-radius: 1rem;">
                <div class="text-center text-dark">
                    <h3 class="mb-0">Sign Up</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('signup.store') }}" method="POST" id="demo-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter your full name" required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Enter your email" required value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password"
                                placeholder="Enter password" required>
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm password" required>
                            @error('password_confirmation')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
                        @error('g-recaptcha-response')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <small>Already have an account? <a href="/signin">Login here</a></small>
                </div>
            </div>
        </div>
        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.in_site_key') }}"></script>
        <script>
            document.getElementById('demo-form').addEventListener('submit', function (e) {
                e.preventDefault(); // prevent immediate submit

                grecaptcha.ready(function () {
                    grecaptcha.execute('{{ config('services.recaptcha.in_site_key') }}', { action: 'register' })
                        .then(function (token) {
                            document.getElementById('recaptchaResponse').value = token;
                            e.target.submit(); // submit after token is set
                        })
                        .catch(function (error) {
                            console.error('reCAPTCHA error:', error);
                        });
                });
            }); 
        </script>

@endsection