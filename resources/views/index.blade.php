@extends('layouts.temp')

@section('title')
    Vetopet | Home
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
    <div class="container">
        <div class="row teks">
            <div class="col-lg-6 col-md-12 col-12">
                <h1 class="judul1">Caring for your <span class="judul1 judul2">furry friends,</span> like family</h1>
                <p class="slogan">Provide the best product for your pet</p> <br />
                <div class="button">
                    <input type="search" class="col-lg-6 col-12 f_search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="col-lg-3 col-12 btn_search">search</button>
                </div>    
            </div>
            <div class="col-lg-6 col-12 text-end d-none d-sm-block">
                <img class="gambar" src="image/home.png" alt="homefoto1" width="600">
            </div>
        </div>
    </div>

    <div class="bg_purple">
        <div class="container">
            <div class="row konten3">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="t_kuning mt-5">The Services We Have</h1>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="t_putih">Here are several services that you can choose for your pet's needs so that your pet is healthy and happy</p>
                </div>
                <div class="row d-flex text-center">
                    <div class="col-lg-3 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/clinic.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Pet Clinic</h2>
                                <p class="card-text">We want to help you to keep and maintain your Pets’ health and nutrition through our service-oriented consultation. </p>
                            </div>    
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/grooming.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Pet Grooming</h2>
                                <p class="card-text">Every time you check your cat or pet, we will definitely check and groom your animal at the same time.</p>
                            </div>    
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/vaccine.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Full Vaccine</h2>
                                <p class="card-text">All the animals examined here have been vaccinated and you can adjust the price of the vaccine to your pet's needs.</p>
                            </div>    
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/sterille.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Sterile 24/7</h2>
                                <p class="card-text">All places and medicines used must be sterile for your pet when checked by us and don't worry about bacteria.</p>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row konten3">
            <div class="col-lg-6 col-md-6 col-12">
                <img src="image/gambar2.png" alt="" width="60%">
            </div>

            <div class="col-lg-6 col-md-6 col-12 text3">
                <h1>For Your Pet’s Natural Life and Healthy Pet With Our Service</h1>
                <p>Let's immediately bring your pet here guaranteed everything will be healthy and always happy and very smart later</p>
                <a href="" style="text-decoration: none;"><p>Learn more</p></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row konten4">
            <div class="col-12 d-flex justify-content-center">
                <h3 class="t_purple">TRENDING CATEGORIES</h3>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <h1>Shop By <span class="t_purple">Categories</span></h1>
            </div>
            <div class="row d-flex text-center">
                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a style="text-decoration: none;" href="{{ route('shop_kucing', ['jenisanimal' => 'kucing']) }}">
                    <div class="card card_category" style="width: 100%;">
                        <img src="image/c_cat.png" class="card-img-top c_service c_pet" alt="...">
                        <div class="card-body">
                            <h2 class="card-title-category">Cat</h2>
                        </div>    
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a style="text-decoration: none;" href="{{ route('shop_kucing', ['jenisanimal' => 'hamster']) }}">
                    <div class="card card_category" style="width: 100%;">
                        <img src="image/c_hamster.png" class="card-img-top c_service c_pet" alt="...">
                        <div class="card-body">
                            <h2 class="card-title-category">Hamster</h2>
                        </div>    
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a style="text-decoration: none;" href="{{ route('shop_kucing', ['jenisanimal' => 'anjing']) }}">
                    <div class="card card_category" style="width: 100%;">
                        <img src="image/c_dog.png" class="card-img-top c_service c_pet" alt="...">
                        <div class="card-body">
                            <h2 class="card-title-category">Dog</h2>
                        </div>    
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6 d-flex justify-content-center">
                    <a style="text-decoration: none;" href="{{ route('shop_kucing', ['jenisanimal' => 'kelinci']) }}">
                    <div class="card card_category" style="width: 100%;">
                        <img src="image/c_rabbit.png" class="card-img-top c_service c_pet" alt="...">
                        <div class="card-body">
                            <h2 class="card-title-category">Rabbit</h2>
                        </div>    
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row konten4">
            <div class="col-12 d-flex justify-content-center">
                <h3 class="h3_teks_price">The best Planing Price For Your pet Services</h3>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <p class="p_teks_price">We offer very cheap prices and are also very flexible in the pocket of any citizen</p>
            </div>
            <div class="row d-flex">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card_purchase" style="width: 100%;">
                        <h3 class="type_service">Full Cat Vaccine Pack</h3>
                        <h2 class="card-title price_service">700 K</h2>
                        <h6 class="date_service">3 Month</h6>
                        <div class="card-body">
                            <ul>
                                <li class="detail_service">Consultation</li>
                                <li class="detail_service">Nobivac/Felocel 3/Felocel 4</li>
                                <li class="detail_service">Nobivac Rabies/Defensor</li>
                            </ul>
                            <button class="purchase">Purchase Pack</button>
                        </div>    
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card_purchase" style="width: 100%;">
                        <h3 class="type_service">Full Dog Vaccine Pack</h3>
                        <h2 class="card-title price_service">700 K</h2>
                        <h6 class="date_service">3 Month</h6>
                        <div class="card-body">
                            <ul>
                                <li class="detail_service">Consultation</li>
                                <li class="detail_service">Nobivac/Felocel 3/Felocel 4</li>
                                <li class="detail_service">Nobivac Rabies/Defensor</li>
                            </ul>
                            <button class="purchase">Purchase Pack</button>
                        </div>    
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card_purchase" style="width: 100%;">
                        <h3 class="type_service">Rabies Pack</h3>
                        <h2 class="card-title price_service">99 K</h2>
                        <h6 class="date_service">3 Month</h6>
                        <div class="card-body">
                            <ul>
                                <li class="detail_service">Consultation</li>
                                <li class="detail_service">Nobivac/Felocel 3/Felocel 4</li>
                                <li class="detail_service">Nobivac Rabies/Defensor</li>
                            </ul>
                            <button class="purchase">Purchase Pack</button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection