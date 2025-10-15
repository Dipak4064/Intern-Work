@extends('component.home')
@section('title', 'Sign In')
@section('main-section')
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px; border-radius: 1rem;">
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
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                    </div>
                </form>
            </div>
            @if($errors->any())
                <div class="card-footer text-body-secondary">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="text-center">
                <small>Don't have an account? <a href="/signup">sign up here</a></small>
            </div>
        </div>
    </div>
@endsection