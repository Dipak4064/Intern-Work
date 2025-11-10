@extends('template.super')
@section('title', 'Welcome to Site')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Welcome to the Site</h3>
        <p>This is the welcome page.</p>
    </div>
@endsection