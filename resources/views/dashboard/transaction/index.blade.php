@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extensions/flatpickr/flatpickr.min.css') }}">


  <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

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
                        <h4>Pilih Rentang Waktu</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="" method="GET" class="mb-5">
                            <p>Pilih 2 tanggal untuk mendapat rentang waktu</p>

                            <div class="input-group mb-3">
                                <input type="text" name="date" id="date" class="form-control flatpickr-range" placeholder="Pilih rentang waktu.." value="{{ $selected_date }}">
                                <button type="submit" class="btn btn-primary">Terapkan</button>
                            </div>
                        </form>


                        <div class="mt-3">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Jumlah Transaksi</td>
                                            <td>{{ $tickets->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Barang Terjual</td>
                                            <td>{{ $totalQuantity }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Pendapatan</td>
                                            <td>Rp{{ number_format($totalAmount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Rata-rata Nilai per Transaksi</td>
                                            <td>Rp{{ $tickets->count() > 0 ? number_format($totalAmount / $tickets->count(), 0, ',', '.') : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Keuntungan</td>
                                            <td>Rp{{ number_format($totalProfit, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Cetak Laporan Penjualan</td>
                                            <td><a href="{{ route('transactions.print', ['date' => $selected_date]) }}" target="_blank" class="btn btn-primary">Cetak</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Ukuran</th>
                                            <th>Warna</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Modal</th>
                                            <th>Submodal</th>
                                            <th>Subprofit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticketDetails as $ticket)
                                        <tr>
                                            <td>{{ $ticket->item_name }}</td>
                                            <td>{{ $ticket->item_size ?? '-' }}</td>
                                            <td>{{ $ticket->item_colour ?? '-' }}</td>
                                            <td>Rp{{ number_format($ticket->item_price, 0, ',', '.') }}</td>
                                            <td>{{ $ticket->total_quantity }}</td>
                                            <td>Rp{{ number_format($ticket->total_subtotal, 0, ',', '.') }}</td>
                                            <td>Rp{{ number_format($ticket->buying_price, 0, ',', '.') }}</td>
                                            <td>Rp{{ number_format($ticket->total_submodal, 0, ',', '.') }}</td>
                                            <td>Rp{{ number_format($ticket->total_subprofit, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
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
<!-- Locale Indonesia -->
<script src="{{ asset('assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
<script src="{{ asset('assets/static/js/pages/date-picker.js') }}"></script>
<script>
document.getElementById('filter_month').addEventListener('change', function() {
    const value = this.value;
    if(value) {
        // Buat query param date=value
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?date=' + encodeURIComponent(value);
        // Arahkan browser ke URL baru (reload)
        window.location.href = newUrl;
    } else {
        // Kalau kosong, hilangkan query param date
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.location.href = newUrl;
    }
});
</script>

<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
@endsection