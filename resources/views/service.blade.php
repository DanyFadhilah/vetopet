@extends('layouts.temp')

@section('title')
    Vetopet | Service
@endsection

@section('css')
    <link rel="stylesheet" href="css/service.css">
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
            <a class="nav-link active" href="{{ route('service') }}">Services</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="t_putih">Services</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="bg_purple">
        <div class="container">
            <div class="row service1">
                <div class="col-12 d-flex justify-content-center">
                    <h1 class="t_kuning mt-1">Set The Booking Appointment Date</h1>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="t_putih">You can make an appointment with our vet before coming to the Groovy Vetcare Clinic. An appointment can be made 1 day before the planned visit date.</p>
                </div>
                <div class="row d-flex text-center">
                    <div class="col-lg-4 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/icon_calendar.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">1 Day Before</h2>
                                <p class="card-text">Make sure the "Appointment Booking" is done 1 day before the planned arrival.</p>
                            </div>    
                        </div>
                    </div>

                    <div class="col-lg-4 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/icon_wait.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Wait for confirmation</h2>
                                <p class="card-text">We will ensure availability of time and the best vet to serve you.</p>
                            </div>    
                        </div>
                    </div>

                    <div class="col-lg-4 col-6 d-flex justify-content-center">
                        <div class="card" style="width: 100%;">
                            <img src="image/icon_paw.png" class="card-img-top c_service" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">Welcome</h2>
                                <p class="card-text">Please come to Groovy Vetcare Clinic according to the date and time we confirmed via your email.</p>
                            </div>    
                        </div>
                    </div>

                    {{-- <div class="col-7 ms-auto me-auto">
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label style="width: 100%" class="col-md-4 col-form-label text-md-start" for="inlineFormCustomSelect">{{ __('Type of Services') }}<span class="text-danger">*</span></label>
                                <select required name="category_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Pilih Service</option>
                                    <option value="1">Grooming Sehat</option>
                                    <option value="2">Grooming Kutu</option>
                                    <option value="3">Grooming Jamur</option>
                                    <option value="4">Grooming Kombinasi</option>
                                    <option value="5">Grooming Kering</option>
                                    <option value="6">Pet Clinic</option>
                                    <option value="7">Full Pet Vaccine</option>
                                    <option value="8">Rabie Vaccine</option>
                                    <option value="9">Pet Sterile</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label style="width: 100%" class="col-md-4 col-form-label text-md-start" for="nama">{{ __('Nama') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="row mb-3">
                                <label style="width: 100%" class="col-md-4 col-form-label text-md-start" for="inlineFormCustomSelect">{{ __('Alamat') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection