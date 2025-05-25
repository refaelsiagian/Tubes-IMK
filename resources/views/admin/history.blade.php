@extends('dashboard.layout.main')

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
                            <table class="table table-striped table-bordered table-hover" id="item-table">
                                <thead>
                                    <tr>
                                        <th>Kode Pembelian</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->created_at->format('H:i:s') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-{{ $ticket->id }}">
                                                    Lihat
                                                </button>
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

@foreach ($tickets as $ticket)
<div class="modal modal-border fade text-left" id="modal-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $ticket->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel{{ $ticket->id }}">Kode: {{ $ticket->id }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($ticket->ticket_details as $detail)
                                <tr>
                                    <td>{{ $detail->item_name ?? ($detail->item->name ?? '-') }}, {{ $detail->item_colour ?? '-' }}, {{ $detail->item_size ?? '-' }}</td>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
