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
                    @if ($ticket == null)
                    <div class="card-header">
                        {{-- Notifikasi --}}
                        @if(session('success'))
                            <div class="alert alert-light-success color-success alert-dismissible fade show mb-3">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-light-danger color-danger alert-dismissible fade show mb-3">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Tombol Transaksi Baru hanya muncul jika belum ada tiket --}}
                        <form action="{{ route('tickets.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Transaksi Baru</button>
                        </form>
                    </div>
                    @else
                    {{-- Jika tiket sudah ada, tampilkan detail transaksi --}}
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
                                                <form class="delete-item-form"
                                                    data-item-name="{{ $detail->item_name }}"
                                                    action="{{ route('ticket.item.destroy', ['ticket' => $ticket->id, 'item' => $detail->item_id, 'id' => $detail->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-item-btn" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                                <a href="{{ route('tickets.add') }}" class="btn btn-primary">
                                    Tambah Barang
                                </a>
                            </div>

                            <div class="col-md-12 text-end">
                                <h6>{{ $totalQuantity ?? 0 }} Item</h6>
                                <h4>Total: Rp {{ number_format($totalPrice ?? 0, 0, ',', '.') }}</h4>
                            </div>

                            <div class="col-md-12 text-end d-flex justify-content-end gap-2">
                                <!-- Konfirmasi -->
                                @if($ticket->ticket_details->count() > 0)
                                <form id="confirmForm" action="{{ route('tickets.confirm', $ticket->id) }}" method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        Konfirmasi
                                    </button>
                                </form>
                                @endif

                                <!-- Batal -->
                                <form id="cancelForm" action="{{ route('tickets.cancel', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                        Batal
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus item <strong id="itemNameToDelete">ini</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Konfirmasi Batal Tiket -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cancelModalLabel">Konfirmasi Pembatalan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin membatalkan tiket ini? Semua item di dalamnya akan dihapus.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-danger" id="confirmCancelBtn">Ya, Batalkan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Konfirmasi Tiket -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Tiket</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin mengonfirmasi tiket ini? Data tidak bisa diubah setelah dikonfirmasi.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" id="confirmSubmitBtn">Ya, Konfirmasi</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>
    document.getElementById('confirmCancelBtn').addEventListener('click', function () {
        document.getElementById('cancelForm').submit();
    });
</script>

<script>
    let deleteForm = null;

    document.querySelectorAll('.delete-item-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            deleteForm = form;

            const itemName = form.getAttribute('data-item-name');
            document.getElementById('itemNameToDelete').textContent = itemName || 'ini';
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (deleteForm) {
            deleteForm.submit();
        }
    });
</script>

<script>
    document.getElementById('confirmSubmitBtn').addEventListener('click', function () {
        document.getElementById('confirmForm').submit();
    });
</script>


@endsection
