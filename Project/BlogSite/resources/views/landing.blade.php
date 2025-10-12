@extends('component.home')
@section('title', 'Blogging site - Landing Page')

@section('main-section')
    <div class="container mt-4">
        <div class="row">
            {{-- @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $post->image_url }}" class="card-img-top" alt="Post Image"
                        style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $post->owner->name }}</h6>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($post->content, strlen($post->content) / 2) }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://britenet.eu/content/uploads/2024/04/Machine-learning-5-questions.jpg"
                        class="card-img-top" alt="Post Image" style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By John Doe</h6>
                        <p class="card-text text-wrap"
                            style="line-height: 1.5; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            Technology continues to evolve at an unprecedented pace in today's digital world.
                            Artificial intelligence and machine learning are transforming how we work and live.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://britenet.eu/content/uploads/2024/04/Machine-learning-5-questions.jpg"
                        class="card-img-top" alt="Post Image" style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By John Doe</h6>
                        <p class="card-text text-wrap"
                            style="line-height: 1.5; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            Sustainable development is crucial for our planet's future wellbeing and prosperity.
                            Green technologies are revolutionizing industries across the globe today.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://britenet.eu/content/uploads/2024/04/Machine-learning-5-questions.jpg"
                        class="card-img-top" alt="Post Image" style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By John Doe</h6>
                        <p class="card-text text-wrap"
                            style="line-height: 1.5; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            Digital transformation has reshaped the way businesses operate and compete globally.
                            Cloud computing enables organizations to scale efficiently and reduce operational costs.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://britenet.eu/content/uploads/2024/04/Machine-learning-5-questions.jpg"
                        class="card-img-top" alt="Post Image" style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By John Doe</h6>
                        <p class="card-text text-wrap"
                            style="line-height: 1.5; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            Education systems are adapting to incorporate modern learning methodologies and
                            technologies. Online platforms have democratized access to knowledge and skill
                            development.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://britenet.eu/content/uploads/2024/04/Machine-learning-5-questions.jpg"
                        class="card-img-top" alt="Post Image" style="height:300px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By John Doe</h6>
                        <p class="card-text text-wrap"
                            style="line-height: 1.5; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                            Healthcare innovations are improving patient outcomes and quality of life worldwide.
                            Telemedicine has expanded access to medical care in remote and underserved areas.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection