@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">


  <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@section('content')

<div class="page-heading">
    <h3>Barang</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $title }}</h5>
                            <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Barang</a>
                        </div>
                        <div class="btn-group mb-3">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle me-1" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Kategori
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('items.index') }}">Semua Kategori</a>
                                    @foreach ($categories as $category)
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['category' => $category->category_slug]) }}">{{ $category->category_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('items.print') }}" class="btn btn-primary">Cetak Stok</a>
                            </div>
                        </div>

                        @if (session('success'))
                        <div class="alert alert-light-success color-success alert-dismissible fade show mb-3">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" style="min-width: 800px; white-space: nowrap;" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ number_format($item->selling_price, 0, ',', '.') }}</td>
                                    <td>{{ $item->total_stock }}</td>
                                    <td>
                                        @if ($item->item_status == 1)
                                        <span class="badge rounded-pill bg-success">Ditampilkan</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Ditarik</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('items.details', $item->id).'?from=items'  }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Foto & Stok">Detail</a>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-reference="parent">
                                            <span class="sr-only">Status</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <h6 class="dropdown-header">Status</h6>
                                            @if($item->item_status == 1)
                                            <form action="{{ route('items.withdraw', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link" >
                                                    Tarik
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('items.restore', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link">
                                                    Tampilkan
                                                </button>
                                            </form>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link">
                                                    Hapus
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
<script>
    // If you want to use tooltips in your project, we suggest initializing them globally
    // instead of a "per-page" level.
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
</script>
@endsection