@extends('component.home')
@section('title', 'Data Page')
@section('main-section')
    <div class="container mt-4">
        <h2 class="mb-3">Assign Role</h2>

        <form action="{{ route('roles.assign') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">-- Select user --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ (collect(old('role'))->contains($role->name)) ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                @error('role')
                <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Assign Role</button>
        </form>
    </div>
@endsection