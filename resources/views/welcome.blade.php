@extends('layouts.temp')
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Petovet</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
      <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 teks">
                    <h1 class="judul1">Caring for your</h1>
                    <h1 class="judul2">furry friends,</h1>
                    <h1 class="judul1">like family</h1> 
                    <p>Provide the best product for your pet</p> <br />
                    <p>
                        <form class="d-flex" role="search">
                            <input class="form-control-sm col-6 me-3" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn" type="submit">Search</button>
                        </form>
                    </p>
                </div>
                <div class="col-lg-6 col-12 text-end d-none d-sm-block">
                    <img src="image/home.png" alt="homefoto1" width="600">
                </div>
            </div>
        </div>
    </body>
</html>
