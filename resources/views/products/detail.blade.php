@extends('layouts.master')

@section('title')
    Dashboard | Deatil Data Produk
@endsection

@section('sidebar')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard/home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabAdmin"
            aria-expanded="true" aria-controls="tabAdmin">
            <i class="fas fa-users-cog"></i>
            <span>Halaman Admin</span>
        </a>
        <div id="tabAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Admin</h6>
                <a class="collapse-item" href="{{ route('add.admin') }}">Create</a>
                <a class="collapse-item active" href="{{ route('table.admin.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabTeacher"
            aria-expanded="true" aria-controls="tabTeacher">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Halaman Produk</span>
        </a>
        <div id="tabTeacher" class="collapse" aria-labelledby="headingTeacher" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Produk</h6>
                <a class="collapse-item" href="{{ route('add.product') }}">Create</a>
                <a class="collapse-item active" href="{{ route('table.product.list') }}">Table</a>
            </div>
        </div>
    </li>
@endsection


@section('content')
<div class="col-12">
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>

<a href="{{ route('table.product.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Detail Data Produk <i class="fas fa-exchange-alt"></i> {{ $products->nama_produk }}</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">                    
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" value="{{ $products->nama_produk ?? '' }}" id="nama_produk" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" value="{{ $products->harga ?? '' }}" id="alamat_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_id">Kategori</label>
                                <input type="text" class="form-control" value="{{ $products->category->nama_produk ?? '' }}" id="alamat_2" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="typeanimal_id">Jenis Hewan</label>
                                <input name="typeanimal_id" type="text" class="form-control" value="{{ $products->typeanimal_id ?? '' }}" id="provinsi" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" value="{{ $products->stok ?? '' }}" id="stok" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="berat">Berat (gr)</label>
                                <input type="text" class="form-control" value="{{ $products->berat ?? '' }}" id="berat" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile">Foto Produk</label>
                                <img src="{{ asset('storage/images/'.$products->image) }}" class="img-fluid w-100" style="  object-position: center;"  alt="Foto Profil">
                            </div>
                        </div>
                    </div>
            </div>
		</div>
	</div>
</div>
@endsection
