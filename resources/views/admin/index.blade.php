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
                        {{-- Tombol Transaksi Baru hanya muncul jika belum ada tiket --}}
                        @if (!isset($ticket))
                            <form action="{{ route('tickets.store') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Transaksi Baru</button>
                            </form>
                        @endif
                    </div>

                    {{-- Jika tiket sudah ada, tampilkan detail transaksi --}}
                    @if (isset($ticket))
                        <div id="detailTransaksi">
                            <div class="card-header">
                                <h4>Nomor Transaksi: {{ $ticket->id }}</h4>
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
                                            @forelse ($ticketDetails as $detail)
                                                <tr>
                                                    <td>{{ $detail->item_name ?? '-' }}</td>
                                                    <td>{{ $detail->item_colour ?? '-' }}</td>
                                                    <td>{{ $detail->item_size ?? '-' }}</td>
                                                    <td>Rp{{ number_format($detail->item_price ?? 0, 0, ',', '.') }}</td>
                                                    <td>{{ $detail->item_quantity }}</td>
                                                    <td>Rp{{ number_format(($detail->item_price ?? 0) * $detail->item_quantity, 0, ',', '.') }}</td>
                                                    <td>
<form action="{{ route('ticket.item.destroy', ['ticket' => $ticket->id, 'item' => $detail->item_id]) }}"
      method="POST"
      onsubmit="return confirm('Yakin ingin menghapus item ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash"></i>
                                                            
    </button>
</form>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Belum ada barang</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <a href="{{ route('tickets.add', ['ticket_id' => $ticket->id]) }}" class="btn btn-primary">
                                            Tambah Barang
                                        </a>
                                    </div>

                                    <div class="col-md-12 text-end">
                                        <h6>{{ $totalQuantity ?? 0 }} Item</h6>
                                        <h4>Total: Rp {{ number_format($totalPrice ?? 0, 0, ',', '.') }}</h4>
                                    </div>

                                    <div class="col-md-12 text-end d-flex justify-content-end gap-2">
                                        {{-- Konfirmasi --}}
                                        <form id="confirmForm" action="{{ route('tickets.confirm', $ticket->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                                        </form>

                                        {{-- Batal --}}
                                        <form id="cancelForm" action="{{ route('tickets.cancel', $ticket->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="confirmCancel()">Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>

{{-- Notifikasi --}}
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

{{-- Error Message --}}
@if(session('error'))
    <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<script>
    function confirmCancel() {
        if (confirm('Apakah Anda yakin ingin membatalkan transaksi?')) {
            document.getElementById('cancelForm').submit();
        }
    }
</script>

@endsection