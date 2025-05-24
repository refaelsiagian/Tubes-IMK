@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Riwayat Penjualan Hari Ini</h3>
    <p class="text-muted">23 Maret 2022</p>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="item-table">
                                <thead>
                                    <tr>
                                        <th>Kode Pembelian</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SH0045</td>
                                        <td>13:54:12</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Lihat
                                            </button>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>SH0045</td>
                                        <td>13:54:12</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Lihat
                                            </button>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>SH0045</td>
                                        <td>13:54:12</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Lihat
                                            </button>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>SH0045</td>
                                        <td>13:54:12</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Lihat
                                            </button>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>SH0045</td>
                                        <td>13:54:12</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Lihat
                                            </button>
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

<!--Confirm delete Modal -->
<div class="modal modal-border fade text-left" id="deleteModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">SH0045</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="item-table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pashmina, Merah, XL</td>
                                    <td>2</td>
                                    <td>Rp30.000</td>
                                </tr>
                                <tr>
                                    <td>Baju, XL</td>
                                    <td>1</td>
                                    <td>Rp40.000</td>
                                </tr>
                                <tr>
                                    <td>Hijab, XL</td>
                                    <td>2</td>
                                    <td>Rp80.000</td>
                                </tr>
                                <tr>
                                    <td><p class="fw-bold">Total</p></td>
                                    <td></td>
                                    <td><p class="fw-bold">Rp160.000</p></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection