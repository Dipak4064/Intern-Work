@extends('component.home')
@section('title', '403 Forbidden')
@section('main-section')
    <div class="container mt-5 text-center">
        <h1>Access Denied</h1>
        <p>You do not have permission to access this page.</p>
        @if (!Auth::check())
            <p>Firstly you need to login.</p>
            <a href="{{ route('signin.index') }}" class="btn btn-primary mt-3">Login</a>
        @endif
    </div>
@endsection