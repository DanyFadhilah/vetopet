@extends('layouts.temp')

@section('title')
    Vetopet | About
@endsection

@section('css')
    <link rel="stylesheet" href="css/about.css">
@endsection

@section('nav')
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
         </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('about') }}">About</a>
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
<div class="container konten">
    <div class="row">
        <div class="col-8 kanan">
            <img src="image/gambar_about.png" alt="" width="100%">
        </div>

        <div class="col-4 bg-gray">
            <h1 class="t_purple">About Us</h1>
            <h4>The First Animal Health Clinic and Petshop in Cibinong</h4>
            <p>Vetopet is a veterinary clinic and pethop located in Bogor. As a trusted place for your favorite pet. With the concept of "One Stop Service Solution" you can simply come to one location that provides reliable, friendly and comfortable medical, petshop and grooming services. We are determined to be a partner for you and your pet based on the principle of "High Trust" making us one of the most trusted veterinary clinic destinations.</p>
            <p>Synergy: Having a goal to bring synergy to customers, fellow employees, outside parties in the form of good cooperation and full of dedication.</p>
        </div>
</div>
@endsection