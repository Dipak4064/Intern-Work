@extends('layout')
@section('title', 'Add User')
@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 text-primary">➕ Add New User</h2>

                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter name" value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                            <label for="email">Email address</label>
                        </div>

                        <!-- Age -->
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control rounded-3 @error('age') is-invalid @enderror" id="age"
                                name="age" placeholder="Enter age" value="{{ old('age') }}">
                            <label for="age">Age</label>
                            @error('age')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- City -->
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control rounded-3 @error('city') is-invalid @enderror" id="city"
                                name="city" placeholder="Enter city" value="{{ old('city') }}">
                            <label for="city">City</label>
                            @error('city')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                Submit
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection