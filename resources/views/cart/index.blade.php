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
<div class="container">
<h1 style="margin-top: 10%">Shopping Cart</h1>

    @if ($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                <tr>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td class="col-2"><img style="max-width: 100%" src="{{ asset('storage/images/' . $cartItem->product->image) }}" class="card-img-top" alt="..."></td>
                        <td class="nama_produk">{{ $cartItem->product->nama_produk }}</td>
                        <td class="quantity">{{ $cartItem->quantity }}</td>
                        <td class="harga">{{ $cartItem->product->harga }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $cartItem) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Remove</button>
                            </form>
                            <form action="{{ route('cart.remove', $cartItem) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button style="margin-top: 10px" type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>   
@endsection