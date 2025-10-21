@extends('component.home')
@section('title', 'Extra Features')
@section('main-section')
    <div class="container py-5 text-center">
        <h2 class="mb-5 fw-bold">Extra Features</h2>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <!-- Chat Feature Card -->
            <div class="feature-card chat p-4 bg-light rounded shadow-sm text-center transition-hover">
                <i class="fa-solid fa-comments fa-3x text-primary mb-3"></i>
                <h5 class="fw-bold">Chat</h5>
                <p class="text-muted small">Instant messaging with your contacts.</p>
            </div>

            <!-- Video Feature Card -->
            <div class="feature-card video p-4 bg-light rounded shadow-sm text-center transition-hover">
                <i class="fa-solid fa-video fa-3x text-success mb-3"></i>
                <h5 class="fw-bold">Video</h5>
                <p class="text-muted small">High-quality video calls anytime.</p>
            </div>
        </div>
    </div>

    <style>
        .feature-card {
            width: 200px;
            cursor: pointer;
        }

        .transition-hover {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .transition-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>
        document.querySelector('.chat').addEventListener('click', function () {
            window.location.href = "{{ route('chat') }}";
        });
        document.querySelector('.video').addEventListener('click', function () {
            window.location.href = "{{ route('video') }}";
        });
    </script>
@endsection