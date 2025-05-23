@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Barang sesuai Kategori</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Hijab Instan</h5>
                            <div class="btn-group mb-1">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Kategori
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Hijab Instan</a>
                                        <a class="dropdown-item" href="#">Pashmina</a>
                                        <a class="dropdown-item" href="#">Perlengkapan Haji</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="item-table">
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
                                    <tr>
                                        <td>Item 1</td>
                                        <td>Pashmina</td>
                                        <td>10000</td>
                                        <td>50</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-primary">Edit</i></a>
                                            <a href="#" class="btn btn-danger">Hapus</a>                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>Pashmina</td>
                                        <td>10000</td>
                                        <td>50</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 3</td>
                                        <td>Perlengkapan Haji</td>
                                        <td>10000</td>
                                        <td>50</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 4</td>
                                        <td>Perlengkapan Haji</td>
                                        <td>10000</td>
                                        <td>50</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 5</td>
                                        <td>Perlengkapan Haji</td>
                                        <td>10000</td>
                                        <td>50</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection