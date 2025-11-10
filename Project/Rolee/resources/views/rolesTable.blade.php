@extends('template.super')
@section('title', 'Roles Table')
@section('content')
    <div class="container">
        <h3>Roles Table</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-success">Create Role</a>
                <thead>
                    <th>Name</th>
                    <th>Created At</th>
                </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            {{ $role->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>
@endsection