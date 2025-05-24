@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Kasir</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary">Transaksi Baru</button>
                        <h4 >Nomor Transaksi: 0001</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="item-table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Warna</th>
                                        <th>Size</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Item 1</td>
                                        <td>Merah</td>
                                        <td>M</td>
                                        <td>Rp10000</td>
                                        <td>2</td>
                                        <td>Rp20000</td>
                                        <td>
                                            <a href="#" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>Biru</td>
                                        <td>L</td>
                                        <td>Rp15000</td>
                                        <td>1</td>
                                        <td>Rp15000</td>
                                        <td>
                                            <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>Biru</td>
                                        <td>L</td>
                                        <td>Rp15000</td>
                                        <td>1</td>
                                        <td>Rp15000</td>
                                        <td>
                                            <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>Biru</td>
                                        <td>L</td>
                                        <td>Rp15000</td>
                                        <td>1</td>
                                        <td>Rp15000</td>
                                        <td>
                                            <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>Biru</td>
                                        <td>L</td>
                                        <td>Rp15000</td>
                                        <td>1</td>
                                        <td>Rp15000</td>
                                        <td>
                                            <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>Biru</td>
                                        <td>L</td>
                                        <td>Rp15000</td>
                                        <td>1</td>
                                        <td>Rp15000</td>
                                        <td>
                                            <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>                                        
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('tickets.add') }}" class="btn btn-primary">
                                    Tambah Barang
                                </a>
                            </div>
                            <div class="col-md-6 text-end">
                                <h6>12 Item</h6>
                                <h4>Total: Rp 100.000</h4>
                            </div>

                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-success">
                                    Konfirmasi
                                </button>
                                <button type="button" class="btn btn-danger">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection