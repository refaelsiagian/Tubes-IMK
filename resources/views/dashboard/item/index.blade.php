@extends('dashboard.layout.main')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">

<link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endsection

@section('content')

<div class="page-heading">
    <h3>Barang</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $title }}</h5>
                            <a href="{{ route('items.create') }}" class="btn btn-primary">Tambah Barang</a>
                        </div>
                        <div class="btn-group mb-3">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle me-1" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Kategori
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('items.index') }}">Semua Kategori</a>
                                    @foreach ($categories as $category)
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['category' => $category->category_slug]) }}">{{ $category->category_name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('items.print') }}" class="btn btn-primary">Cetak Stok</a>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-light-success color-success alert-dismissible fade show mb-3">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-light-danger color-danger alert-dismissible fade show mb-3">
                                {!! nl2br(e(session('error'))) !!}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" style="min-width: 800px; white-space: nowrap;" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ number_format($item->selling_price, 0, ',', '.') }}</td>
                                    <td>{{ $item->total_stock }}</td>
                                    <td>
                                        @if ($item->item_status == 1)
                                        <span class="badge rounded-pill bg-success">Ditampilkan</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Ditarik</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('items.details', $item->id).'?from=items'  }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Foto & Stok">Detail</a>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-reference="parent">
                                            <span class="sr-only">Status</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <h6 class="dropdown-header">Status</h6>
                                            @if($item->item_status == 1)
                                            <form action="{{ route('items.withdraw', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link" >
                                                    Tarik
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('items.restore', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link">
                                                    Tampilkan
                                                </button>
                                            </form>
                                            <button type="button" class="dropdown-item btn-link" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter{{ $item->id }}">
                                                    Hapus
                                            </button>
                                            @endif
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
    </section>
</div>


@foreach($items as $item)
  <div class="modal fade modal-borderless" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Yakin ingin menghapus item ini? Segala hal tentang barang ini mulai dari gambar, stok, varian dan lain sebagainya akan hilang. Riwayat transaksi tidak akan terpengaruh.</p>

            <label for="password" class="form-label">Masukkan password untuk menghapus</label>
            <input type="password" name="password" id="password-{{ $item->id }}" class="form-control password-input" required autofocus placeholder="Masukkan password">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger btn-delete-item" data-item-id="{{ $item->id }}">
                <span class="btn-text">Hapus</span>
                <span class="btn-spinner d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </button>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection

@section('script')
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}">
</script><script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>

<script>
    // If you want to use tooltips in your project, we suggest initializing them globally
    // instead of a "per-page" level.
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const deleteButtons = document.querySelectorAll('.btn-delete-item');

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const itemId = this.getAttribute('data-item-id');
            const passwordInput = document.getElementById(`password-${itemId}`);
            const password = passwordInput.value;
            const button = this;
            const textSpan = button.querySelector('.btn-text');
            const spinnerSpan = button.querySelector('.btn-spinner');

            if (!password) {
                Toastify({
                    text: "Password wajib diisi", 
                    backgroundColor: "#f44336",
                    gravity: "top",
                    position: "center"
                }).showToast();
                return;
            }

            // ⏳ Tampilkan spinner dan disable tombol
            button.disabled = true;
            textSpan.classList.add('d-none');
            spinnerSpan.classList.remove('d-none');

            fetch(`/owner/items/${itemId}/force-delete`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ password })
            })
            .then(async response => {
                const contentType = response.headers.get("content-type") || "";
                if (!contentType.includes("application/json")) {
                    throw { message: "Server tidak merespon dengan format JSON. Cek token CSRF atau sesi login." };
                }

                const data = await response.json();
                if (!response.ok) {
                    throw data;
                }
                return data;
            })
            .then(data => {
                if (data.status === 'success') {
                    Toastify({
                        text: data.message,
                        backgroundColor: "#4CAF50",
                        gravity: "top",
                        position: "center"
                    }).showToast();

                    const modal = bootstrap.Modal.getInstance(document.getElementById(`exampleModalCenter${itemId}`));
                    modal.hide();

                    document.getElementById(`row-${itemId}`).remove();
                } else {
                    Toastify({
                        text: data.message,
                        backgroundColor: "#f44336",
                        gravity: "top",
                        position: "center"
                    }).showToast();
                }
            })
            .catch(err => {
                console.error(err);
                Toastify({
                    text: err.message || "Terjadi kesalahan",
                    backgroundColor: "#f44336",
                    gravity: "top",
                    position: "center"
                }).showToast();
            })
            .finally(() => {
                // ✅ Aktifkan kembali tombol & reset tampilannya
                button.disabled = false;
                textSpan.classList.remove('d-none');
                spinnerSpan.classList.add('d-none');
            });
        });

    });
});


</script>
@endsection