<!doctype html>
<html lang="en">

<head>
    <title>Add User</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 text-primary">Update User</h2>

                    <form action="{{route('update', ['id' => $user->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="name" name="name"
                                placeholder="Enter name" value="{{$user->name}}">
                            <label for="name">Name</label>
                        </div>
                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="email" name="email"
                                placeholder="Enter email" value="{{$user->email}}">
                            <label for="email">Email address</label>
                        </div>

                        <!-- Age -->
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control rounded-3" id="age" name="age"
                                placeholder="Enter age" value="{{$user->age}}">
                            <label for="age">Age</label>
                        </div>
                        <!-- City -->
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control rounded-3" id="city" name="city"
                                placeholder="Enter city" value="{{$user->city}}">
                            <label for="city">City</label>
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
</body>

</html>