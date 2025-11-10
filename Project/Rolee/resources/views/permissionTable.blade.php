@extends('template.super')
@section('title', 'Roles Table')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success my-3">
                {{ session('success') }}
            </div>
        @endif
        <h3>Permission Table</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-success">Create Permission</a>
                <thead>
                    <th>Name</th>
                    <th>Created At</th>
                </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                        {{ $permission->created_at->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
@endsection