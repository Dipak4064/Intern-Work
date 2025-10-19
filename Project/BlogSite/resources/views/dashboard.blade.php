@extends('component.home')
@section('title', 'Dashboard')
@section('main-section')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-4">
            <div class="row g-0 align-items-center">
                <div class="col-md-4 bg-primary text-white text-center py-5">
                    <i class="fa-solid fa-user-circle fa-7x mb-3"></i>
                    <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                    <p class="text-light">{{ Auth::user()->email }}</p>
                    <a href="#" class="btn btn-light btn-sm rounded-pill px-3 mt-2">Edit Profile</a>
                </div>
                <div class="col-md-8 p-4">
                    <h3 class="fw-bold mb-3">Welcome Back 👋</h3>
                    <p class="text-secondary fs-5">
                        Hello <strong>{{ Auth::user()->name }}</strong>, this is your account dashboard.
                        You can manage your profile, view your activities, and update your settings here.
                    </p>
                    <div class="d-flex gap-3 mt-4 flex-wrap">
                        <a href="#" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fa-solid fa-gear me-2"></i>Settings
                        </a>
                        <a href="#" class="btn btn-outline-success rounded-pill px-4">
                            <i class="fa-solid fa-bell me-2"></i>Notifications
                        </a>
                        @can('isadmin')
                            <a href="{{ route('trash.index') }}" class="btn btn-outline-success rounded-pill px-4">
                                <i class="fa-solid fa-trash"></i>
                                Trash Bin
                            </a>    
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-success rounded-pill px-4">
                                <i class="fa-solid fa-user-shield me-2"></i>
                                Admin Panel
                            </a>
                        @endcan
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger rounded-pill px-4">
                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-0 rounded-4 p-4 h-100">
                    <i class="fa-solid fa-pen-nib fa-2x text-primary mb-3"></i>
                    <h5 class="fw-bold">Your Posts</h5>
                    <p class="text-muted">12 total posts published</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm rounded-pill px-3">View Posts</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-0 rounded-4 p-4 h-100">
                    <i class="fa-solid fa-heart fa-2x text-danger mb-3"></i>
                    <h5 class="fw-bold">Favorites</h5>
                    <p class="text-muted">5 saved items</p>
                    <a href="#" class="btn btn-danger btn-sm rounded-pill px-3">View Favorites</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-0 rounded-4 p-4 h-100">
                    <i class="fa-solid fa-comment fa-2x text-warning mb-3"></i>
                    <h5 class="fw-bold">Create Post</h5>
                    <p class="text-muted">make the post</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-warning btn-sm rounded-pill px-3">New Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection