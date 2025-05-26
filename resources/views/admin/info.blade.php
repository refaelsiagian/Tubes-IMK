@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">


  <link rel="stylesheet" href="./assets/compiled/css/table-datatable.css">
@endsection


@section('content')

<div class="page-heading">
    <h3>Informasi Penjualan Hari Ini</h3>
    <h6>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</h6>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="row">

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldWallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Penghasilan</h6>
                                    <h6 class="font-extrabold mb-0">Rp{{ number_format($totalIncome, 0, ',', '.') }}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Barang Terjual</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalItemSold }} Item</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldWallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Banyak Transaksi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $transactionCount }} Transaksi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Rata-Rata Transaksi</h6>
                                    <h6 class="font-extrabold mb-0">Rp{{ number_format($avgTransaction, 0, ',', '.') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless table-hover" id="form-table" style="min-width: 800px; white-space: nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Barang terjual</th>
                                            <th>Dalam Transaksi</th>
                                            <th>Total Penghasilan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($itemSales as $item)
                                        <tr>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->barang_terjual }}</td>
                                            <td>{{ $item->banyak_transaksi }} kali</td>
                                            <td>Rp{{ number_format($item->penghasilan, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td><p class="fw-bold">Total</p></td>
                                            <td><p class="fw-bold">{{ $totalItemSold }}</p></td>
                                            <td></td>
                                            <td><p class="fw-bold">Rp{{ number_format($totalIncome, 0, ',', '.') }}</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
