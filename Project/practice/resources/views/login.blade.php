@extends('layout.super')
@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg,#f6f8ff 0%, #e9efff 100%);">
        <div class="card shadow-sm rounded-4 p-4" style="width: 100%; max-width:420px; border: none;">
            <div class="card-body p-4"></div>
            @if(session('success'))
                <div class="alert alert-success small" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger small" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger small">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/login" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label small">Email address</label>
                    <div class="input-group">
                        <input type="email" class="form-control border-start-0" id="email" name="email"
                            value="{{ old('email') }}" required autofocus aria-describedby="emailHelp">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control border-start-0" id="password" name="password" required>
                    </div>
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                </div>

                <div class="text-center small text-muted">
                    Don't have an account? <a href="/register">Create one</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection