@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">


  <link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
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
                        <div class="btn-group mb-1">
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
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
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
                                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-success">Lihat</a>
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
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
<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>
@endsection