@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Transaksi</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4>Transaksi Tahunan</h4>
                    </div>
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
										<h6 class="fw-bold">2025</h6>
									</button>
								</h2>
								<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold">Total Pendapatan</td>
                                                        <td>Rp237.578.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Jumlah Transaksi</td>
                                                        <td>679</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Produk Terlaris</td>
                                                        <td>
                                                            <ul>
                                                                <li>Item 1</li>
                                                                <li>Item 2</li>
                                                                <li>Item 3</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Rata-rata Nilai Transaksi</td>
                                                        <td>Rp165.079</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Cetak Laporan</td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary">Cetak</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Detail Transaksi per Bulan</td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary">Lihat</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTw" aria-expanded="false" aria-controls="flush-collapseTw">
										<h6 class="fw-bold">2024</h6>
									</button>
								</h2>
								<div id="flush-collapseTw" class="accordion-collapse collapse" aria-labelledby="flush-headingTw" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseT" aria-expanded="false" aria-controls="flush-collapseT">
										<h6 class="fw-bold">2023</h6>
									</button>
								</h2>
								<div id="flush-collapseT" class="accordion-collapse collapse" aria-labelledby="flush-headingT" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
								</div>
							</div>
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