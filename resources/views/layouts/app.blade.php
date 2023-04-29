<!DOCTYPE html>
<html lang="{{ session('locale') ?? 'en' }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Un site web dynamique en utilisant le cadriciel Laravel" />
    <meta name="author" content="Pablo Gomes" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon-maisonneuve.png') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        @php $lang = session('locale') @endphp

        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}"><img
                    src="{{ asset('assets/favicon-maisonneuve.png') }}" alt="Icone Maisonneuve">
                {{ config('app.name') }}</a>
            <a class="navbar-brand" href="{{ route('welcome') }}"> @lang('lang.text_hello')
                {{ Auth::user()->name ?? __('lang.text_guest') }}.</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    @guest
                        <!-- Options for GUEST not connected -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.create') }}">@lang('lang.text_register')</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">@lang('lang.text_login')</a></li>
                    @else
                        <!-- Options for USER  connected -->
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="{{ route('user.list') }}">@lang('lang.text_users')</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="{{ route('blog.index') }}">@lang('lang.text_posts')</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#">Documents</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page"
                                href="{{ route('logout') }}">@lang('lang.text_logout')</a></li>
                    @endguest

                    <!-- Options for LANGUAGE -->
                    @if ($lang == 'en')
                        <small><a class="nav-link" href="{{ route('lang', 'fr') }}">(Français 🇫🇷)</a></small>
                    @else
                        <small><a class="nav-link" href="{{ route('lang', 'en') }}">(English 🇺🇸)</a></small>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content-->
    <div class="container mb-5 custom-mb-10">
        @if (session('success'))
            <div class="row justify-content-center mt-2 mb-1">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Footer de la Page -->
    <footer class="fixed-bottom text-center text-lg-start bg-light text-muted mt-5">
        <div class="text-center p-4" style="background-color: rgba(0, 62, 126, 0.1);">
            <small>
                <a class="text-reset fw-bold" href="{{ route('welcome') }}">{{ config('app.name') }}</a> - 2023
                - Template: <a class="text-reset fw-bold" href="https://startbootstrap.com/template/bare"
                    target="_blank">Start Bootstrap: bare</a>
            </small>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    @yield('js')

</body>

</html>
