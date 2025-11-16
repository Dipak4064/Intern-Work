@extends('layout.super')
@section('content')
    <div class="container d-flex flex-column align-items-center justify-content-center text-center" style="height: 490px;">
        <h1 class="mb-3">Welcome to Our Application</h1>
        <p class="lead mb-0">This is a simple application built with Laravel and Bootstrap.</p>
    </div>
    <a href="{{ route('postPage') }}">
        <button>Create a Post</button>
    </a>
@endsection