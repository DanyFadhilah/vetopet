@extends('layouts.master')

@section('title')
    Dashboard | Product Table
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
            <span>Halaman Product</span>
        </a>
        <div id="tabTeacher" class="collapse" aria-labelledby="headingTeacher" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Product</h6>
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
<!-- Section Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('add.product') }}" class="btn btn-primary mb-3">
                        + Tambah Product Baru
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Berat</th>
                                <th>Category</th>
                                <th>Jenis Hewan</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td style="width= 50%">
                                    <img src="{{ asset('storage/images/'.$product->image) }}" alt="Product Image" class="img-fluid">
                                </td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->harga }}</td>
                                <td>{{ $product->stok }}</td>
                                <td>{{ $product->berat }}</td>
                                <td>{{ $product->category->nama_produk }}</td>
                                <td>{{ $product->typeanimal_id }}</td>
                                <td>
                                    <div class="btn-group">
                                <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button" id="action' . {{ $product->id }} . '"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  {{ $product->id }} . '">
                                    <a class="dropdown-item" href="{{ route ('edit.product', $product->id) }}">Sunting</a>
                                    <a class="dropdown-item" href="{{ route ('view.detail.product', $product->id) }}">Lihat Detail</a>
                                    <form action="{{ route('destroy.product', $product->id) }}" method="POST">
                                         @method('DELETE')
                                            @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                                </td>
                            </tr>
                            @endforeach
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{{ route("table.product.list") }}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'profile', name: 'profile' },
                { data: 'nama_produk', name: 'nama_produk' },
                { data: 'harga', name: 'harga' },
                { data: 'stok', name: 'stok' },
                { data: 'berat', name: 'berat' },
                { data: 'category', name: 'category' },
                { data: 'jenis_hewan', name: 'jenis_hewan' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush --}}
