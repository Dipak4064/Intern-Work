@extends('component.home')
@section('title', 'Blogging site - Landing Page')

@section('main-section')
    <div class="container mt-4">
        <div class="mt-5 text-center py-5">
            <div class="mb-4">
                <h2 class="fw-bold text-primary">Discover Blogs</h2>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if(!empty($post->img_path))
                            <img src="{{ asset('storage/' . $post->img_path) }}" class="card-img-top" alt="Post Image"
                                style="height:300px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">By {{ $post->user->name ?? 'Unknown' }}</h6>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($post->content, 100) }}
                            </p>
                            <a href="" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection