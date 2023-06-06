@extends('layouts.blank')

@section('title')
    Vetopet | Login
@endsection

@section('content')
<div class="container-fluid bg_white">
    <div class="row">
        <div class="col-5 kanan ms-10 kiri_signin">
            <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h1 class="teks_signin">SIGN IN</h1>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="   invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 btn_login">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
        </div>

        <div class="col-6 kiri kanan_signin">
            
            <img class="logo" src="image/favicon.png" alt="">
            <h1 class="judul1 text-center t_purple" style="width: 100%;">WELCOME TO <span class="t_orange">VETOPET</span></h1>
            <p class="tagline">Enter your details and start journey with us</p>
            <button class="btn_to_signup"><a href="{{ route('register') }}">SIGN UP</a></button>
        </div>
    </div>
</div>
@endsection
