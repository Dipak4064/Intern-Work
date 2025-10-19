@extends('component.home')
@section('title', 'Data Page')
@section('main-section')
    <div class="container py-5">
        <h2 class="mb-4">Data Panel</h2>
        <a href="{{ route('logout') }}" class="btn btn-sm btn-primary me-2 mb-4">Log Out</a>
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-success mb-4">Go Back</a>
        @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">No posts available.</td>
                    </tr>
                @endif

                @foreach ($posts as $post)
                    @php
                        $user = \App\Models\User::find($post->user_id);
                        $name = $user ? $user->name : 'Unknown';
                    @endphp

                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at->format('d M Y') }}</td>
                        <td>{{ $post->updated_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('post.restore', $post->id) }}" class="btn btn-sm btn-info me-2">restore</a>
                            <form action="{{ route('permanent.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this post?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection