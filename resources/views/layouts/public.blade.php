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
            <a class="col-12 col-md-3 title text-center" href="{{ url('/design') }}">
                average-developer.com
            </a>
            <div class="col-12 col-md-6 text-center" id="navbarSupportedContent">
                <span class="nav-item">
                    <a  href="#">Blogs</a>
                </span>
                <span class="nav-item">
                    <a href="#">Youtube (coming soon)</a>
                </span>
                <span class="nav-item">
                    <a href="#">Github</a>
                </span>
                <span class="nav-item">
                    <a href="#">Contact us</a>
                </span>
            </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</div>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-12 col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="text-muted">© 2022 Rytis Klimavicius</span>
        </div>

        <ul class="nav col-12 col-md-4 justify-content-end list-unstyled d-flex">
            <span>Icons...</span>
{{--            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>--}}
{{--            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>--}}
{{--            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>--}}
        </ul>
    </footer>
</div>
</body>
</html>
