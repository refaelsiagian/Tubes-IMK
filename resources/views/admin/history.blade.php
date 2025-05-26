@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">


  <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@section('content')

<div class="page-heading">
    <h3>Riwayat Penjualan Hari Ini</h3>
    <p class="text-muted">{{ $riwayat }}</p>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table1" style="min-width: 800px; white-space: nowrap">
                                <thead>
                                    <tr>
                                        <th>Kode Pembelian</th>
                                        <th>Admin</th>
                                        <th>Waktu</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->admin->name }}</td>
                                            <td>{{ $ticket->created_at->format('H:i:s') }}</td>
                                            <td>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 60%;">Nama Barang</th>
                                                                <th style="width: 15%;">Jumlah</th>
                                                                <th style="width: 25%;">Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $total = 0; @endphp
                                                            @foreach ($ticket->ticket_details as $detail)
                                                                <tr>
                                                                    <td>{{ $detail->item_name ?? ($detail->item->name ?? '-') }}{{ $detail->item_colour ? ', ' . $detail->item_colour : '' }}{{ $detail->item_size ? ', ' . $detail->item_size : '' }}</td>
                                                                    <td>{{ $detail->item_quantity ?? $detail->qty }}</td>
                                                                    <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                                                </tr>
                                                                @php $total += $detail->subtotal; @endphp
                                                            @endforeach
                                                            <tr>
                                                                <td><strong>Total</strong></td>
                                                                <td></td>
                                                                <td><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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

@section('script')
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
@endsection