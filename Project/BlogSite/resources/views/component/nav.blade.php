<div class="nav-wrapper d-flex justify-content-between align-items-center bg-light">
    <div class="logo">
        <a href="/">
            <img src="https://th.bing.com/th/id/R.7e665da3a90b4c2184370ea5fcdbe883?rik=%2bN8Z7f2c0cPNAw&pid=ImgRaw&r=0"
                alt="logo" />
        </a>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Learn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 fw-bold" href="{{ route('extra.features') }}">Extra features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/getprice">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="/signin">Sign In</a>
                    </li>
                    @can('isloggedin')
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="{{ route('dashboard') }}">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                    @endcan

                    @cannot('isloggedin')
                    <li class="nav-item">
                        <a class="fs-5 px-3 py-2 text-white bg-primary rounded-4" href="/signup"
                            style="transition: 0.3s; text-decoration: none;">
                            Sign Up
                        </a>
                    </li>
                    @endcannot
                </ul>
            </div>
        </div>
    </nav>
</div>