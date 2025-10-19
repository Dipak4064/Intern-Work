@extends('component.home')
@section('title', 'Post View')
@section('main-section')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg h-100">
                    @if(!empty($post->img_path))
                            <img src="{{ asset('storage/' . ($post->img_path)) }}" alt="Post Image" style="height:100%; width:100%; object-fit:cover; object-position:center;">
                    @endif
                    <div class="card-body text-start">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $post->user->name }}</h6>
                        <p class="card-text text-wrap"
                            style="line-height: 1.5; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            {{ $post->content }}
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                        <a href="{{ route('updatepost', $post->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection