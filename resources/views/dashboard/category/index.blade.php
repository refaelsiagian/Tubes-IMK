@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Kategori</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Tambah Kategori
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="item-table">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Banyak Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pashmina</td>
                                        <td>50</td>
                                        <td>
                                            <a href="{{ route('categories.show', 1)}}" class="btn btn-success">Lihat</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Hapus
                                            </button>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>Hijab Instan</td>
                                        <td>35</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Perlengkapan Haji</td>
                                        <td>18</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aksesoris Hijab</td>
                                        <td>66</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hijab Segi Empat</td>
                                        <td>44</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Lihat</a>
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


<!--Create form Modal -->
<div class="modal modal-borderless fade text-left" id="inlineForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Kategori</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <label for="email" class="form-label">Kategori</label>
                    <div class="form-group">
                        <input id="email" type="text" placeholder="Masukkan Kategori"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Confirm delete Modal -->
<div class="modal modal-borderless fade text-left" id="deleteModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Konfirmasi</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus kategori ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="button" class="btn btn-danger ms-1"
                        data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection