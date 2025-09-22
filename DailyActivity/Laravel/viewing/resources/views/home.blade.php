@extends('welcome')
@section('title')
    Home Page
@endsection
@section('heading')
    <h1 class="display-4 fw-bold">Welcome to home section</h1>
@endsection

@section('image')
    <img src="https://wallpapercave.com/wp/wp14381330.jpg" class="img-fluid rounded" alt="Placeholder Image"
        style='height: 500px; width:400px;'>
@endsection

@push('scripts')
    <script>
        console.log('hello there i am');
    </script>
@endpush