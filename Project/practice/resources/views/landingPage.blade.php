@extends('layout.super')
@section('content')
    <div class="container py-5">
        <style>
            .landing-hero { background: linear-gradient(135deg,#f5f9ff 0%, #ffffff 100%); padding: 1.25rem; border-radius: .75rem; }
            .post-card { border: 0; border-radius: .75rem; overflow: hidden; transition: transform .18s ease, box-shadow .18s ease; }
            .post-card:hover { transform: translateY(-6px); box-shadow: 0 10px 30px rgba(18,38,63,.12); }
            .search-input { box-shadow: 0 6px 18px rgba(20,40,70,.06); }
            .muted-sm { font-size: .85rem; color: #6c757d; }
        </style>

        <div class="landing-hero mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h1 class="h2 mb-1">This is the landing page!</h1>
                <p class="muted-sm mb-0">Discover the latest posts from the community.</p>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <a href="{{ route('logout') }}" class="btn btn-outline-secondary">Log out</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form class="mb-4" method="GET" action="">
            <div class="input-group search-input">
                <input type="search" name="q" class="form-control" placeholder="Search posts..." value="{{ request('q') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <div class="row g-4">
            @forelse($posts as $post)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card post-card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2">{{ $post->title }}</h5>
                            <p class="card-text text-muted mb-3">{{ \Illuminate\Support\Str::limit($post->content, 140) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <small class="muted-sm">Posted by User ID: {{ $post->user_id }}</small>
                                <a href="#" class="btn btn-sm btn-outline-primary">Read</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No posts found.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection