@extends('layouts.master')

@section('title')
    Dashboard | Edit Data Produk
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

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabStudent"
            aria-expanded="true" aria-controls="tabStudent">
            <i class="fas fa-user-graduate"></i>
            <span>Halaman Siswa</span>
        </a>
        <div id="tabStudent" class="collapse" aria-labelledby="headingStudent" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Siswa</h6>
                <a class="collapse-item active" href="{{ route('add.student') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.student.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMajor"
            aria-expanded="true" aria-controls="tabMajor">
            <i class="fas fa-place-of-worship"></i>
            <span>Halaman Jurusan</span>
        </a>
        <div id="tabMajor" class="collapse" aria-labelledby="headingMajor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Jurusan</h6>
                <a class="collapse-item active" href="{{ route('add.major') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.major.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabClass"
            aria-expanded="true" aria-controls="tabClass">
            <i class="fas fa-hourglass-half"></i>
            <span>Halaman Kelas</span>
        </a>
        <div id="tabClass" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Kelas</h6>
                <a class="collapse-item" href="{{ route('add.class') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.class.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMapel"
            aria-expanded="true" aria-controls="tabMapel">
            <i class="fas fa-book"></i>
            <span>Halaman Mapel</span>
        </a>
        <div id="tabMapel" class="collapse" aria-labelledby="headingMapel" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Mata Pelajaran</h6>
                <a class="collapse-item" href="{{ route('add.lesson') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.lesson.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabJadwal"
            aria-expanded="true" aria-controls="tabJadwal">
            <i class="fas fa-book"></i>
            <span>Hal Jadwal Pelajaran</span>
        </a>
        <div id="tabJadwal" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Jadwal Pelajaran</h6>
                <a class="collapse-item" href="{{ route('add.jadwal') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.jadwal.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMateri"
            aria-expanded="true" aria-controls="tabMateri">
            <i class="fas fa-book"></i>
            <span>Halaman Materi</span>
        </a>
        <div id="tabMateri" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Materi</h6>
                <a class="collapse-item" href="{{ route('add.materi') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.materi.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRpp"
            aria-expanded="true" aria-controls="tabRpp">
            <i class="fas fa-book"></i>
            <span>Halaman RPP</span>
        </a>
        <div id="tabRpp" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola RPP</h6>
                <a class="collapse-item" href="{{ route('add.rpp') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.rpp.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRapot"
            aria-expanded="true" aria-controls="tabRapot">
            <i class="fas fa-book"></i>
            <span>Halaman Rapot</span>
        </a>
        <div id="tabRapot" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Rapot</h6>
                <a class="collapse-item" href="{{ route('add.rapot') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.rapot.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabEskul"
            aria-expanded="true" aria-controls="tabEskul">
            <i class="fas fa-book"></i>
            <span>Halaman Ekstrakulikuler</span>
        </a>
        <div id="tabEskul" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Ekstrakulikuler</h6>
                <a class="collapse-item" href="{{ route('add.ekskul') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.ekskul.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabInfo"
            aria-expanded="true" aria-controls="tabInfo">
            <i class="fas fa-info-circle"></i>
            <span>Halaman Informasi</span>
        </a>
        <div id="tabInfo" class="collapse" aria-labelledby="headingInfo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Informasi</h6>
                <a class="collapse-item" href="{{ route('add.info') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.info.list') }}">Table</a>
            </div>
        </div>
    </li> --}}
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
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Edit Data Produk</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.product', $products->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') ?? $products->nama_produk }}" id="nama_produk" placeholder="Input Nama Produk">
                                @error('nama_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_produk') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga">harga</label>
                                <input name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') ?? $products->harga }}" id="harga" placeholder="Input Harga">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_id">Category <span class="text-danger">*</span></label>
                                <select required name="category_id" class="custom-select mr-sm-2" id="category_id">
                                    <option selected>Pilih Category</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="typeanimal_id">Jenis Hewan <span class="text-danger">*</span></label>
                                <select required name="typeanimal_id" class="custom-select mr-sm-2" id="typeanimal_id">
                                    <option selected>Pilih Jenis Hewan</option>
                                    @foreach($typeanimal as $ani)
                                    <option value="{{ $ani->id }}">{{ $ani->jenis_hewan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input name="stok" type="text" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') ?? $products->stok }}" id="stok" placeholder="Input Stok">
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stok') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="berat">Berat (gr)</label>
                                <input name="berat" type="text" class="form-control @error('berat') is-invalid @enderror" value="{{ old('berat') ?? $products->berat }}" id="berat" placeholder="Input Berat">
                                @error('berat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('berat') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Foto Produk</label>
                                <input name="image" type="file" class="form-control @error('profile') is-invalid @enderror" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Update</button>
                </form>
            </div>
		</div>
	</div>
</div>
@endsection
