<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  bg-secondary  shadow-sm">
            <div class="container ">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item  mr-5" >
                            <a class="nav-link text-white" href="{{ route('home') }}">Strona głowna</a>
                        </li>
                        <li class="nav-item  mr-5">
                            <a class="nav-link text-white" href="{{ route('add') }}">Dodaj wpis</a>
                        </li>
                        <li class="nav-item  mr-5">
                            <a class="nav-link text-white" href="{{ route('author') }}">O autorze</a>
                        </li>
                        <li class="nav-item  mr-5">
                            <a class="nav-link text-white" href="{{ route('info') }}">Kilka słów o blogu</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white disabled" >{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')

        </main>

        
    </div>
    <footer class="bg-dark text-white text-lg-start footer">
        <div class="text-center" >
            © 2021 Copyright Jakub Dobosz Blog motoryzacyjny
        </div>
    </footer>
</body>
</html>
