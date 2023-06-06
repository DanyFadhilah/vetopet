<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="../image/favicon.png" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Petovet') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="navbar-fixed">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('index') }}"><img src="../image/favicon.png" alt="logo" class="img-fluid" width="160" height="40"  /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @yield('nav')
            <a class="nav-chart ms-2" href="{{route("cart.index")}}"><img src="../image/chart-menu.png" alt="chart" class="img-fluid1" width="30" height="30"  /></a>
            <a class="nav-contact ms-2 me-2" href="{{ route("contact")}}"><img src="../image/contact-menu.png" alt="contact" class="img-fluid2" width="30" height="30"  /></a>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    {{-- @auth
                            <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-signin"><img src="image/signin-menu.png" alt="signin" class="img-fluid3" width="90" height="30"  /></a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-signup"><img src="image/signup-menu.png" alt="signup" class="img-fluid4" width="90" height="30"  /></a>
                            @endif
                    @endauth --}}

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
            @endif
        </div>
    </div>
</nav>
    </div class="mt-6">
        
        <main class="py-4">
            @yield('content')
        </main>


    </div>

    <div class="bg_cr">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <p class="t_putih">Copyright Vetopet 2023 All Right </p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
