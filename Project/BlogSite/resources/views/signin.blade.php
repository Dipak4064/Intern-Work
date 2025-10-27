@extends('component.home')
@section('title', 'Sign In')
@section('main-section')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px; border-radius: 1rem;">
            @if(session('message'))
                <div class="alert alert-info text-center">
                    {{ session('message') }}
                </div>
            @endif
            <div class="text-center text-dark">
                <h3 class="mb-0">Sign In</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('signin.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password"
                            placeholder="Enter password" required>
                    </div>
                    <div class="g-recaptcha mb-3" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <span class="text-danger">{{ $error }}</span><br>
                                    @endforeach 
                               
                    @endif
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg mt-2">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <small>Don't have an account? <a href="/signup">sign up here</a></small>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
@endsection