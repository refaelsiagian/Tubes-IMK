@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Informasi Penjualan Hari Ini</h3>
    <h6>21 Maret 2022</h6>
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
                                    <h6 class="font-extrabold mb-0">Rp912.000</h6>
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
                                    <h6 class="font-extrabold mb-0">28 Item</h6>
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
                                    <h6 class="font-extrabold mb-0">8 Transaksi</h6>
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
                                    <h6 class="font-extrabold mb-0">Rp134.683</h6>
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
                                <table class="table table-striped table-borderless table-hover" id="item-table">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Barang terjual</th>
                                            <th>Banyak Transaksi</th>
                                            <th>Total Penghasilan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Item 1</td>
                                            <td>2 </td>
                                            <td>1 kali</td>
                                            <td>Rp40.000</td>
                                        </tr>
                                        <tr>
                                            <td>Item 4</td>
                                            <td>5 </td>
                                            <td>3 kali</td>
                                            <td>Rp180.000</td>
                                        </tr>
                                        <tr>
                                            <td>Item 5</td>
                                            <td>9 </td>
                                            <td>7 kali</td>
                                            <td>Rp260.000</td>
                                        </tr>
                                        <tr>
                                            <td>Item 7</td>
                                            <td>4 </td>
                                            <td>4 kali</td>
                                            <td>Rp40.000</td>
                                        </tr>
                                        <tr>
                                            <td>Item 9</td>
                                            <td>8 </td>
                                            <td>3 kali</td>
                                            <td>Rp78.000</td>
                                        </tr>
                                        <tr>
                                            <td><p class="fw-bold">Total</p></td>
                                            <td><p class="fw-bold">28</p></td>
                                            <td></td>
                                            <td><p class="fw-bold">Rp912.000</p></td>
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