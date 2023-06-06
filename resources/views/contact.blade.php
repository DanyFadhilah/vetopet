@extends('layouts.temp')

@section('title')
    Vetopet | Contact
@endsection

@section('css')
    <link rel="stylesheet" href="css/service.css">
    <link rel="stylesheet" href="css/contact.css">
@endsection

@section('nav')
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
         </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('all_shop') }}">Shop</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('service') }}">Services</a>
        </li>
    </ul>
@endsection

@section('content')
<div class="bg_purple">
    <div class="container">
        <div class="row teks">
            <div class="col-lg-6">
                <p>Please type your name, email, and text message and we will response as soon as possible. After office hours may delay to get response but we will email you within 24 hours.</p>
                <form method="POST" action="{{ route('customer.register') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus placeholder="Nama">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="msg" type="text" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" required autocomplete="msg" autofocus placeholder="Enter Your Message.....">

                                @error('msg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Message') }}
                                </button>
                            </div>
                            <div class="col-md-8">
                                <img src="image/icon_wa.png" alt="" width="10%">
                                <p><i>For Urgent Please Use WhatsApp</i></p>
                            </div>
                        </div>
                    </form>
            </div>

            <div class="col-lg-6">

            </div>
        </div>
    </div>
</div>  
    
@endsection