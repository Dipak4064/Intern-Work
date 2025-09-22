@extends('welcome')
@section('title')
    PassValue through Route
@endsection
@section('heading')
    <h1 class="display-4 fw-bold">Welcome to Route passing value</h1>
    <h1>The value are:</h1>
    {{-- <ul>
        <li>{{$name}}</li>
        <li>{{$number}}</li>
        <li>{{!empty($city) ? $city : "No city"}}</li>
    </ul> --}}
    @foreach($array as $id => $item)
        <li>{{ $id }} -> {{ $item['name'] }} | {{ $item['number'] }} | {{ $item['city'] }} | <a
                href="{{ route('view.user', ['id' => $id]) }}">View User</a></li>
    @endforeach
@endsection

@section('image')
    <img src="https://wallpapercave.com/wp/wp14381330.jpg" class="img-fluid rounded" alt="Placeholder Image"
        style='height: 500px; width:400px;'>
@endsection