<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand" aria-label="Simple navigation">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="nav-link p-0" href="{{ url('/') }}">
                        <img src="https://tse3.mm.bing.net/th/id/OIP.IE_-Jzwe730aFotE58-IsAHaHs?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"
                            alt="Laravel" height="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.page') }}">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('permissions.page') }}">Permission</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>