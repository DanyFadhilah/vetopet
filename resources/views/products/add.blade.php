@extends('layouts.master')

@section('title')
    Dashboard | Tambah Product
@endsection

@section('css')
    <style>
        .progress { position:relative; width:100%; }
        .percent { position:absolute; display:inline-block; left:50%; margin-top: 8px; color: #FFFFFF;}
   </style>
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
                <a class="collapse-item" href="{{ route('table.admin.list') }}">Table</a>
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
                <a class="collapse-item active" href="{{ route('add.product') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.product.list') }}">Table</a>
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

<a href="{{ url('/admin/dashboard/home') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Tambah Product</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="/admin/dashboard/add/product/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk <span class="text-danger">*</span></label>
                                <input name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}" id="nama_produk" placeholder="Input Nama Produk">
                                @error('nama_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_produk') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga">Harga <span class="text-danger">*</span></label>
                                <input name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" id="harga" placeholder="Input Harga">
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
                                <label for="stok">Stok <span class="text-danger">*</span></label>
                                <input name="stok" type="number" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" id="stok" placeholder="Input Stok">
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stok') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="berat">Berat</span></label>
                                <input name="berat" type="number" class="form-control @error('berat') is-invalid @enderror" value="{{ old('berat') }}" id="berat" placeholder="Input Berat">
                                @error('berat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('berat') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <!--
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile">Foto Profil <span class="text-danger">*</span></label>
                                <input name="profile" type="file" class="form-control @error('profile') is-invalid @enderror" id="profile">
                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">Foto KTP <span class="text-danger">*</span></label>
                                <input name="ktp" type="file" class="form-control @error('ktp') is-invalid @enderror" id="ktp">
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ktp') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 offset"></div>
                    </div>
                    -->
                    
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Submit</button>
                </form>
            </div>
		</div>
	</div>
</div>
@endsection

{{-- @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
    <script type="text/javascript">
            $(document).ready(function()
            {
                var bar = $('.progress-bar');
                var percent = $('.percent');

                    $('#formAdmin').ajaxForm({
                        beforeSend: function() {
                            var percentVal = '0%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        complete: function(xhr) {
                            alert('File Uploaded Successfully');
                            window.location.href = "/admin/dashboard/add/admin/import";
                        }
                });
            });
        </script>
@endpush --}}
