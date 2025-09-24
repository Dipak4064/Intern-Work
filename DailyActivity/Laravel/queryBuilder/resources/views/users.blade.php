<!doctype html>
<html lang="en">

<head>
    <title>Users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
    </header>
    <main>
        <h3>User List</h3>
        <a href="newuser" class="btn btn-primary mb-4">Add New</a>
        <a href="{{ route('deleteAll') }}" class="btn btn-primary mb-4">Delete All</a>
        <table class="table table-bordered border-primary">
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
                    <td><a href="{{ route('view.user', ['id' => $user->id]) }}" class="btn btn-primary">View</a></td>
                    <td><a href="{{ route('delete.user', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{ route('edit.user', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a></td>
                </tr>
            @endforeach
        </table>
        @if($users->isEmpty())
            <div>
                <p>No users found.</p>
            </div>
        @else
            <div>
                {{$users->links('pagination::bootstrap-5')}}
            </div>
        @endif
    </main>
</body>

</html>