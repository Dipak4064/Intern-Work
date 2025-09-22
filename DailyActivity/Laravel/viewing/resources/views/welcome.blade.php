<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'nothing')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    @include('Layout.header')
    <main class="container my-5">
        <div class="row align-items-center min-vh-95">
            <div class="col-lg-6">
                @hasSection('heading')
                    @yield('heading')
                @else
                    <h1>Doesn't Have Heading</h1>
                @endif
                <p class="lead">
                    This is a simple hero section where you can introduce your site.
                    Use it to highlight important information or call visitors to action.
                </p>
                <a href="#" class="btn btn-primary btn-lg">Get Started</a>
            </div>
            <div class="col-lg-6 text-center">
                @yield('image')
            </div>
        </div> <br>
    </main>
    @include('Layout.footer')
    @stack('scripts')
</body>

</html>