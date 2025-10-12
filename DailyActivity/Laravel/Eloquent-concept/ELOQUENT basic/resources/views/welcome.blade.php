@extends('layout')
@section('title', 'Home')

@section('content')
    <div class="d-flex justify-content-center mb-4 mt-5">
        <a href="{{ route('users.create') }}" class="btn btn-success me-2">Add New</a>
        <a href="{{ route('users.index') }} " class="btn btn-info">see all users</a>
    </div>
@endsection