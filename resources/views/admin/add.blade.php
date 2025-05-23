@extends('dashboard.layout.main')

@section('style')
<style>
    #item-table th,
    #item-table td {
    white-space: nowrap; /* Biar kontennya gak wrap ke bawah */
    min-width: 120px; /* Ganti sesuai kebutuhan */
    }
</style>
@endsection

@section('content')

<div class="page-heading">
    <h3>Tambahkan Belanjaan</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" placeholder="Cari..">
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
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
                                        <th>Masukkan Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Item 1</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Rp10000</td>
                                        <td><input type="number" class="form-control" placeholder="Masukkan Jumlah"></td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 2</td>
                                        <td>-</td>
                                        <td>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option>XL</option>
                                                    <option>Blade Runner</option>
                                                    <option>Thor Ragnarok</option>
                                                </select>
                                            </fieldset>
                                        </td>
                                        <td>Rp15000</td>
                                        <td><input type="number" class="form-control" placeholder="Masukkan Jumlah"></td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 3</td>
                                        <td>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option>Merah</option>
                                                    <option>Blade Runner</option>
                                                    <option>Thor Ragnarok</option>
                                                </select>
                                            </fieldset>
                                        </td>
                                        <td>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option>S</option>
                                                    <option>Blade Runner</option>
                                                    <option>Thor Ragnarok</option>
                                                </select>
                                            </fieldset>
                                        </td>
                                        <td>Rp15000</td>
                                        <td><input type="number" class="form-control" placeholder="Masukkan Jumlah"></td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 4</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Rp15000</td>
                                        <td><input type="number" class="form-control" placeholder="Masukkan Jumlah"></td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 5</td>
                                        <td>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option>Turquoise</option>
                                                    <option>Magenta</option>
                                                    <option>Beige</option>
                                                </select>
                                            </fieldset>
                                        </td>
                                        <td>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option>L</option>
                                                    <option>Blade Runner</option>
                                                    <option>Thor Ragnarok</option>
                                                </select>
                                            </fieldset>
                                        </td>
                                        <td>Rp15000</td>
                                        <td><input type="number" class="form-control" placeholder="Masukkan Jumlah"></td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Item 6</td>
                                        <td>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option>Pink</option>
                                                    <option>Blade Runner</option>
                                                    <option>Thor Ragnarok</option>
                                                </select>
                                            </fieldset>
                                        </td>
                                        <td>-</td>
                                        <td>Rp15000</td>
                                        <td><input type="number" class="form-control" placeholder="Masukkan Jumlah"></td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>                                        
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-end">
                                <h6>12 Item</h6>
                                <h4>Total: Rp 100.000</h4>
                            </div>
                            <div class="col-md-12 text-end">
                                <a href="{{ route('tickets.index')}}" class="btn btn-primary">Kembali ke Daftar Belanja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection