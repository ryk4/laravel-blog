<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar-custom row">
            <a class="col-3 title text-center" href="{{ url('/design') }}">
                average-developer.com
            </a>
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"--}}
{{--                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
{{--                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                <span class="navbar-toggler-icon">LOL</span>--}}
{{--            </button>--}}

            <div class="col-6 text-center" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
{{--                <ul class="navbar-nav me-auto">--}}

{{--                </ul>--}}

                <span class="nav-item">
                    <a  href="#">Blogs</a>
                </span>
                <span class="nav-item">
                    <a href="#">Twitter</a>
                </span>
                <span class="nav-item">
                    <a href="#">Github</a>
                </span>
                <span class="nav-item">
                    <a href="#">Contact us</a>
                </span>



                <!-- Right Side Of Navbar -->
{{--                <ul class="navbar-nav">--}}
{{--                    <!-- Authentication Links -->--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Blogs</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Twitter</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Github</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">About me</a>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
{{--                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                {{ Auth::user()->name }}--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
            </div>
    </nav>
{{--    <div class="title-area">--}}
{{--        <div class="row">--}}
{{--            <div class="col-4 offset-4 text-center mb-3">--}}
{{--                <h3 class="title-area-heading">Your blog title hereee</h3>--}}
{{--            </div>--}}
{{--            <div class="col-4 offset-4 text-center">--}}
{{--                <p class="title-area-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu augue in dolor sodales ultrices. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu augue in dolor sodales ultrices.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <main class="py-4">
        @yield('content')
    </main>

</div>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="text-muted">© 2022 Rytis Klimavicius</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <span>Icons...</span>
{{--            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>--}}
{{--            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>--}}
{{--            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>--}}
        </ul>
    </footer>
</div>
</body>
</html>
