@extends('component.home')
@section('title', 'Update Post')
@section('main-section')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg mx-auto">
                    <!-- Image preview -->
                    <div style="height:300px; width:100%; overflow:hidden; background-color:#f0f0f0;">
                        <img id="previewImage" src="{{ asset('storage/' . ($post->image ?? $post->img_path)) }}"
                            alt="Post Image" style="height:100%; width:100%; object-fit:cover; object-position:center;">
                    </div>

                    <div class="card-body text-start">
                        <h5 class="card-title mb-4">Update Post</h5>
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5"
                                    required>{{ $post->content }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Change Image (optional)</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Update Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Live preview script -->
    <script>
        document.getElementById('image').addEventListener('change', e => {
            if (e.target.files[0]) {
                document.getElementById('previewImage').src = URL.createObjectURL(e.target.files[0]);
            }
        });
    </script>

@endsection