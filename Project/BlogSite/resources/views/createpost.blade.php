@extends('component.home')
@section('title', 'Create Post')
@section('main-section')
    <div class="container py-5 d-flex justify-content-center">
        <div class="w-100" style="max-width: 500px;">
            <h2 class="mb-3">New Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control mb-2" name="title" placeholder="Title" required>

                <textarea class="form-control mb-2" name="content" rows="3" placeholder="What's on your mind?" required
                    style="resize: none; overflow:hidden;"
                    oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';"></textarea>

                <input type="file" class="form-control mb-2" name="image" accept="image/*">

                <button type="submit" class="btn btn-success w-100">Post</button>
            </form>
        </div>
    </div>
@endsection