<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <nav class="nav">
        <a class="nav-link active text-bold" href="/">Home</a>
        <a class="nav-link text-bold" href="{{ route('extraFeature') }}">Extra feature</a>
        @if(Auth::check())
            <a class="nav-link text-bold" href="{{ route('postPage') }}">Create Post</a>
        @else
            <a class="nav-link text-bold" href="{{ route('signupPage') }}">Create account</a>
        @endif
        <a class="nav-link text-bold" href="{{ route('loginPage') }}">Log in</a>
    </nav>

    @yield('content')
    <footer class="bg-dark text-light mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="mb-2">About</h5>
                    <p class="small text-muted mb-0">Short description about your company or application. Keep it one
                        concise sentence.</p>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <h5 class="mb-2">Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a class="text-decoration-none text-light-50" href="#">About Us</a></li>
                        <li><a class="text-decoration-none text-light-50" href="#">Contact</a></li>
                        <li><a class="text-decoration-none text-light-50" href="#">Privacy Policy</a></li>
                        <li><a class="text-decoration-none text-light-50" href="#">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <h5 class="mb-2">Contact</h5>
                    <p class="small text-muted mb-2">Email: <a href="mailto:info@example.com"
                            class="text-decoration-none text-light-50">info@example.com</a></p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm" aria-label="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-twitter" viewBox="0 0 16 16" aria-hidden="true">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.009-.422A6.673 6.673 0 0 0 15 3.542a6.564 6.564 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.555 6.555 0 0 1-2.084.797A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.017 4.382A3.323 3.323 0 0 1 .64 6.575v.041a3.286 3.286 0 0 0 2.633 3.218 3.203 3.203 0 0 1-.865.115c-.212 0-.418-.02-.619-.058a3.288 3.288 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58 6.32 6.32 0 0 1 0 13.538a9.344 9.344 0 0 0 5.026 1.475" />
                            </svg>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm" aria-label="GitHub">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-github" viewBox="0 0 16 16" aria-hidden="true">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8a8 8 0 0 0 5.47 7.59c.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.2 1.87.86 2.33.66.07-.52.28-.86.51-1.06-1.78-.2-3.64-.89-3.64-3.96 0-.87.31-1.59.82-2.15-.08-.2-.36-1.01.08-2.1 0 0 .67-.21 2.2.82a7.6 7.6 0 0 1 2-.27 7.6 7.6 0 0 1 2 .27c1.53-1.03 2.2-.82 2.2-.82.44 1.09.16 1.9.08 2.1.51.56.82 1.28.82 2.15 0 3.08-1.87 3.76-3.65 3.96.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.19 0 .21.15.46.55.38A8 8 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="border-secondary my-3">

            <div class="d-flex flex-column flex-md-row justify-content-between small text-muted">
                <div class="mb-2 mb-md-0">© {{ date('Y') }} Your Company</div>
                <div>
                    <a href="#" class="text-decoration-none text-light-50 me-2">Privacy</a>
                    <a href="#" class="text-decoration-none text-light-50">Terms</a>
                </div>
            </div>
        </div>
    </footer></svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>