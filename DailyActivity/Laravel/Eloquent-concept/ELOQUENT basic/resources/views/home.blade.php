@extends('layout')
@section('title', 'All Users')

@section('content')
    <div class="d-flex justify-content-center mb-4 mt-5">
        <a href="{{ route('users.create') }}" class="btn btn-success me-2">Add New</a>
        <a href="" class="btn btn-danger">Delete All</a>
    </div>
    <table class="table table-striped table-bordered border-primary mx-auto" style="width: 90%;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th>View</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{$user->age}}</td>
                <td>{{$user->city}}</td>
                <td><a href="{{route('users.show', $user->id)}}" class="btn btn-primary">View</a></td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">Edit</a></td>
            </tr>
        @endforeach
    </table>
    <div class="mt-5 mx-auto" style="width: 90%;">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection
