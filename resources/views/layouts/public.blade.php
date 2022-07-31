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
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact us</a>
            </span>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="modal-content" action="{{ route('email.store') }}" method="POST">
                            @method('POST')
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Get in touch with us</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <div class="row">
                                    <div class="col-12 mb-3 text-muted">
                                        I would love to have a chat with you about almost anything :)
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="name">Full name</label>
                                        <input type="text" class="form-control form-control-custom"
                                               id="name" rows="3"
                                               placeholder="Enter your name"
                                               name="name"/>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="mobile">Mobile</label>
                                        <input type="text" class="form-control form-control-custom"
                                               id="mobile" rows="3"
                                               placeholder="Enter your mobile"
                                               name="mobile"/>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label mt-3" for="email">Email *</label>
                                        <input type="email" class="form-control form-control-custom"
                                               id="comment" rows="3"
                                               placeholder="Enter your email address"
                                               name="email" required/>
                                    </div>
                                    <div class="col-12">
                                    <textarea class="form-control form-control-custom mt-3" rows="3"
                                              placeholder="Ask, recommend or offer anything"
                                              name="comment" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-custom-primary">Send email</button>
                            </div>
                        </form>
                    </div>
                </div>
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
