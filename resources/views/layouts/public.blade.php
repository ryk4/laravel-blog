<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ strtolower(config('app.name')) }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css?version=').time() }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<content>
    <div id="app">
        <nav class="navbar-custom row">
            <a class="col-12 col-md-3 title text-center" href="{{ route('blogs.index') }}">
                local-developer.com
            </a>
            <div class="col-12 col-md-6 text-center mt-md-0 mt-3" id="navbarSupportedContent">
            <span class="nav-item">
                <a href="{{ route('blogs.index') }}">Blogs</a>
            </span>
                <span class="nav-item">
                <a href="https://github.com/ryk4">Github</a>
            </span>
                <span class="nav-item">
                @include('components.blog.contact-us-form')
            </span>
                @auth
                    <span class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}">Manage blogs</a>
                </span>
                    <span class="nav-item">
                    <a href="{{ route('admin.tags.index') }}">Manage tags</a>
                </span>
                    <span class="nav-item">
                    <a href="#">Dashboard</a>
                </span>
                @endauth
            </div>
            <div class="col-3 text-end" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{--                        @if (Route::has('login'))--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}

                        {{--                        @if (Route::has('register'))--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{--                            <a class="dropdown-item py-2" href="{{ route('admin.application-settings.index') }}">--}}
                                {{--                                {{ __('Application settings') }}--}}
                                {{--                            </a>--}}
                                <a class="dropdown-item py-2" href="{{ route('admin.jobs.index') }}">
                                    {{ __('Job Queue') }}
                                </a>
                                <a class="dropdown-item py-2" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
</content>
<footer class="mt-auto d-flex flex-wrap justify-content-between align-items-center pt-3 my-3 border-top">
    <div class="col-12 col-md-4 d-flex align-items-center">
        <span
            class="mb-3 me-2 ms-5 mb-md-0 text-muted text-decoration-none lh-1 text-muted">© 2022 All rights reserved</span>
    </div>

    {{--        <ul class="nav col-12 col-md-4 justify-content-end list-unstyled d-flex">--}}
    {{--            <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-github"></i></a></li>--}}
    {{--            <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-envelope"></i></a></li>--}}
    {{--            <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-twitter"></i></a></li>--}}
    {{--        </ul>--}}
</footer>
</body>
</html>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        let successStatus = {!! json_encode(session('successStatus')) !!};

        if (successStatus !== null) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: successStatus
            })
        }

        let warningStatus = {!! json_encode(session('warningStatus')) !!};

        if (warningStatus !== null) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: warningStatus
            })
        }
    });

    window.deleteConfirm = function (formId) {
        Swal.fire({
            icon: 'warning',
            text: 'Are you sure you want to delete this?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }

</script>

@yield('scripts')
