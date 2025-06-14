@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@section('content')

<div class="page-heading">
    <h3>Barang Hampir Habis</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-striped table-hover" style="min-width: 800px; white-space: nowrap;" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Stok</th>
                                    <th>Pengingat Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lowstock as $stock)
                                <tr>
                                    <td>{{ $stock->item_name }}</td>
                                    <td>{{ $stock->colour ?? '-' }}</td>
                                    <td>{{ $stock->size ?? '-' }}</td>
                                    <td>{{ $stock->stock }}</td>
                                    <td>{{ $stock->limit_stock }}</td>
                                    <td>
                                        @can('owner')
                                        <a href="{{ route('item.show', $stock->item_id).'?from=stock' }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Foto & Stok">Lihat</a>
                                        @else
                                        <a href="{{ route('items.details', $stock->item_id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Foto & Stok">Detail</a>
                                        @endcan

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
                        </div>
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