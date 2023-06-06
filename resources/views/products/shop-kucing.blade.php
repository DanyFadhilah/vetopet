@extends('layouts.temp')

@section('title')
    Vetopet | Shop
@endsection 

@section('css')
    <link rel="stylesheet" href="../css/shop.css">
@endsection

@section('nav')
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
         </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('all_shop') }}">Shop</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('service') }}">Services</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="bg_yellow">
        <div class="container">
            <div class="row">
                <div class="bg_putih">
                <div class="col-12">
                    <h1 class="judul">{{ $typeanimal->jenis_hewan }}</h1>

                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="Cari produk...">
                        <button type="submit">Cari</button>
                    </form>

                <li class="nav-item dropdown category" style="list-style: none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                    <img src="../image/arrow_down.png" alt="">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a style="ted" class="dropdown-item" href="{{ route('shop_kucing', ['jenisanimal' => 'kucing']) }}">Kucing</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop_kucing', ['jenisanimal' => 'anjing']) }}">Anjing</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop_kucing', ['jenisanimal' => 'hamster']) }}">Hamster</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop_kucing', ['jenisanimal' => 'kelinci']) }}">Kelinci</a></li>
                    </ul>
                </li>
            </div>
        </div>
            <h1>Produk berdasarkan kategori: {{ $typeanimal->jenis_hewan }}</h1>
            
            <div class="row">
                @foreach($products as $data)
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/images/' . $data->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}} {{$data->berat}}gr</h5>
                        <p class="card-text">Rp.{{$data->harga}}</p>
                        <p class="card-text">Stok : {{$data->stok}}</p>
                    </div>
                </div>
            </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection