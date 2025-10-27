@extends('component.home')
@section('title', 'Dashboard')
@section('main-section')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-4">
            <div class="row g-0 align-items-center">
                <div
                    class="profile col-md-4 bg-primary bg-gradient text-white text-center py-5 d-flex flex-column align-items-center justify-content-center rounded-4 shadow-lg">
                    @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image"
                            class="rounded-circle mb-3 border border-4 border-light" width="150" height="150">
                    @else
                        <i class="fa-solid fa-user-circle fa-7x mb-3"></i>
                    @endif

                    <h4 class="fw-bold mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-light mb-1 small">{{ Auth::user()->email }}</p>
                    <p class="fw-semibold text-white-50 mb-1">{{ Auth::user()->username }}</p>

                    @if(Auth::user()->bio)
                        <p class="fst-italic text-white-50 small w-75 mx-auto">{{ Auth::user()->bio }}</p>
                    @else
                        <p class="fst-italic text-white-50 small w-75 mx-auto">No bio added yet.</p>
                    @endif

                    <a href="#" class="btn btn-light btn-sm rounded-pill px-4 mt-3 fw-semibold profile-btn">
                        <i class="fa-solid fa-pen me-2"></i>Edit Profile
                    </a>
                </div>

                <div class="edit-profile col-md-4 bg-primary text-white text-center py-5 d-none">
                    @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image"
                            class="rounded-circle mb-3 border border-4 border-light" width="150" height="150">
                    @else
                        <i class="fa-solid fa-user-circle fa-7x mb-3"></i>
                    @endif
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"
                        class="d-flex flex-column align-items-center w-100">
                        @csrf
                        <input type="text" value="{{ Auth::user()->name }}" class="form-control mb-2 text-center"
                            style="width: 70%;" name="name" id="name" />

                        <input type="text" value="{{ Auth::user()->username }}" placeholder="Create username"
                            class="form-control mb-2 text-center" name="username" id="username" style="width: 70%;" />

                        <textarea name="bio" id="bio" class="form-control mb-2 text-center" style="width: 70%;"
                            placeholder="Write bio...">{{ Auth::user()->bio }}</textarea>

                        <input type="file" class="form-control mb-2 text-center" style="width: 70%;" name="profile_image"
                            id="profile_image" />

                        <button type="submit" class="btn update-btn btn-light btn-sm rounded-pill px-3 mt-2"
                            style="width: 70%;">
                            Update Profile
                        </button>
                    </form>
                </div>


                <div class="col-md-8 p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show m-0 " role="alert" id="success-alert">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function () {
                                let alert = document.getElementById('success-alert');
                                if (alert) {
                                    setTimeout(function () {
                                        alert.classList.remove('show');

                                    }, 2000);
                                    setTimeout(function () {
                                        alert.remove();
                                    }, 5000);
                                }
                            }, 2000);
                        </script>
                    @endif
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
    <script>
        let profile = document.querySelector('.profile');
        let editProfile = document.querySelector('.edit-profile');
        let profileBtn = document.querySelector('.profile-btn');
        let updateBtn = document.querySelector('.update-btn');
        profileBtn.addEventListener('click', function () {
            profile.classList.add('d-none');
            editProfile.classList.remove('d-none');
        });
        updateBtn.addEventListener('click', function () {
            editProfile.classList.add('d-none');
            profile.classList.remove('d-none');
        });
        console.log('i am the edit-profile');
    </script>
@endsection