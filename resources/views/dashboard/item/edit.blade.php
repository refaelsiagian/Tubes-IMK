@extends('dashboard.layout.main')

@section('style')
<style>
    input.form-control[readonly] {
        cursor: not-allowed
    }
</style>
@endsection



@section('content')

<div class="page-heading">
    <h3>Edit Barang</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="card-content">
                    <div class="card-body">
                        <form id="item-form" action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id" class="form-label fw-bold">ID Barang</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="item_name" class="form-label fw-bold">Nama Barang</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" value="{{ old('item_name') ? old('item_name') : $item->item_name }}" required>
                                @if ($errors->has('item_name'))
                                    <span class="text-danger">{{ $errors->first('item_name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-bold">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        @if (old('category_id') == $category->id || $item->category_id == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="item_description" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" id="item_description" name="item_description" rows="3" required>{{ old('item_description') ? old('item_description') : $item->item_description }}</textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-bold">Ukuran</label>
                                <div id="size-container">
                                    <!-- Tambahan size akan muncul di sini -->
                                    @if($sizes[0] != null)
                                        @foreach($sizes as $size)
                                            <li class="d-flex mb-2">
                                                <input type="text" name="size[]" value="{{ $size }}" placeholder="Ukuran" class="form-control form-control-sm me-2" readonly>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.remove()">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(old('size'))
                                        @foreach(old('size') as $size)
                                            <li class="d-flex mb-2">
                                                <input type="text" name="size[]" value="{{ $size }}" placeholder="Ukuran" class="form-control form-control-sm me-2" required>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.remove()">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSize()">+ Tambah Ukuran</button><br><br>

                                <label class="form-label fw-bold">Warna</label>
                                <div id="colour-container">
                                    @if($colours[0] != null)
                                        @foreach($colours as $colour)
                                            <li class="d-flex mb-2">
                                                <input type="text" name="colour[]" value="{{ $colour }}" placeholder="Warna" class="form-control form-control-sm me-2" readonly>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.remove()">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(old('colour'))
                                        @foreach(old('colour') as $colour)
                                            <li class="d-flex mb-2">
                                                <input type="text" name="colour[]" value="{{ $colour }}" placeholder="Warna" class="form-control form-control-sm me-2" required>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.remove()">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif
                                    <!-- Tambahan warna akan muncul di sini -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addWarna()">+ Tambah Warna</button><br><br>
                            </div>
                            <div class="mb-3">
                                <label for="buying_price" class="form-label fw-bold">Harga Beli</label>
                                <input type="number" class="form-control" id="buying_price" name="buying_price" value="{{ old('buying_price') ? old('buying_price') : $item->buying_price }}" required max="9999999">
                            </div>
                            <div class="mb-3">
                                <label for="selling_price" class="form-label fw-bold">Harga Jual</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ old('selling_price') ? old('selling_price') : $item->selling_price }}" required max="9999999">
                            </div>
                            <button type="button" id="btn-confirm-update" class="btn btn-primary">Simpan & Lanjut</button>
                            <a href="{{ route('items.index') }}" class="btn btn-danger">Batal</a>
                        </form>

                        <!-- Modal Konfirmasi -->
                        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Perubahan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        Menghapus warna dan/atau ukuran secara otomatis akan menghapus data gambar dan stok terkait.
                                        <br><strong>Lanjutkan perbarui data barang?</strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="location.reload()">Batal</button>
                                        <button type="button" class="btn btn-primary" id="modal-confirm-btn">Perbarui</button>
                                    </div>
                                </div>
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
    <script>
        function addSize() {
        const container = document.getElementById('size-container');
        const li = document.createElement('li');
        li.classList.add('d-flex', 'mb-2');

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'size[]';
        input.placeholder = 'Ukuran';
        input.className = 'form-control form-control-sm me-2';
        input.setAttribute('required', 'required');
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'btn btn-danger btn-sm';
        button.innerHTML = '<i class="bi bi-x-circle-fill"></i>';
        button.onclick = () => container.removeChild(li);

        li.appendChild(input);
        li.appendChild(button);
        container.appendChild(li);
        }

        function addWarna() {
            const container = document.getElementById('colour-container');
            const li = document.createElement('li');
            li.classList.add('d-flex', 'mb-2');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'colour[]';
            input.placeholder = 'Warna';
            input.className = 'form-control form-control-sm me-2';
            input.setAttribute('required', 'required');

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-danger btn-sm';
            button.innerHTML = '<i class="bi bi-x-circle-fill"></i>';
            button.onclick = () => container.removeChild(li);

            li.appendChild(input);
            li.appendChild(button);
            container.appendChild(li);
        }
    </script>

<script>
    const form = document.getElementById('item-form');
    const btnConfirmUpdate = document.getElementById('btn-confirm-update');
    const modalConfirmBtn = document.getElementById('modal-confirm-btn');

    // Simpan data size dan warna awal yang readonly
    let initialSizes = Array.from(document.querySelectorAll('#size-container input[readonly]')).map(input => input.value);
    let initialColours = Array.from(document.querySelectorAll('#colour-container input[readonly]')).map(input => input.value);

    btnConfirmUpdate.addEventListener('click', function () {
        const currentSizes = Array.from(document.querySelectorAll('#size-container input')).map(input => input.value);
        const currentColours = Array.from(document.querySelectorAll('#colour-container input')).map(input => input.value);

        // Cek jika ada readonly value yang hilang
        const deletedSizes = initialSizes.filter(size => !currentSizes.includes(size));
        const deletedColours = initialColours.filter(colour => !currentColours.includes(colour));

        if (deletedSizes.length > 0 || deletedColours.length > 0) {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
        } else {
            form.submit(); // Tidak ada yang dihapus, langsung submit
        }
    });

    modalConfirmBtn.addEventListener('click', function () {
        form.submit(); // Submit saat tombol modal ditekan
    });
</script>

@endsection