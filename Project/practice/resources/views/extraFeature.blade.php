@extends('layout.super')
@section('content')
    <div>
        <h1>Extra Feature</h1>
        <p>This is an extra feature page.</p>
    </div>
    @php
        $user = auth()->user();
        $token = $user->currentAccessToken()?->plainTextToken;
        dd($token);
    @endphp
    <a href="{{ route('logout') }}">Log out</a>
@endsection