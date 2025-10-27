@extends('component.home')
@section('title', 'Blogging site - Landing Page')

@section('search-section')
    <div class="search mt-5 text-center py-5 bg-light rounded-4 shadow-sm">
        <div class="mb-4">
            <h2 class="fw-bold text-primary">Discover Inspiring Blogs</h2>
            <p class="text-secondary fs-5">Explore a wide range of topics and insights from industry experts.</p>
        </div>

        <form action="{{ route('search') }}" method="GET" class="d-flex justify-content-center flex-wrap gap-3">
            <div class="position-relative" style="width: 100%; max-width: 600px;">
                <i class="fa-solid fa-magnifying-glass position-absolute"
                    style="left: 25px; top: 50%; transform: translateY(-50%); color: #6c757d; font-size: 20px;"></i>

                <input type="text" name="search" class="form-control ps-5 rounded-pill shadow-sm"
                    placeholder="Search posts..." aria-label="Search"
                    style="height: 60px; font-size: 18px; padding-left: 45px;">
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4" style="font-size: 18px; height: 60px;">
                Search
            </button>
        </form>
    </div>
@endsection

@section('main-section')
    <div class="container mt-4">
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
        {{ $posts->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection