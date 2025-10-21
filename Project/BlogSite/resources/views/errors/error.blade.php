@extends('component.home')
@section('title', '403 Forbidden')
@section('main-section')
    <div class="container mt-5 text-center">
        <h1>🚫 Access Denied</h1>
        <p>You do not have permission to access this page.</p>
        <p>{{ session('message') }}</p>
    </div>
@endsection