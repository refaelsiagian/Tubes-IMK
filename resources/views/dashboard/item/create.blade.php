@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Tambah Barang</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="item_name" class="form-label fw-bold">Nama Barang</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-bold">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="item_description" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" id="item_description" name="item_description" rows="3" required></textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-bold">Ukuran</label>
                                <div id="size-container">
                                    <!-- Tambahan size akan muncul di sini -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSize()">+ Tambah Ukuran</button><br><br>

                                <label class="form-label fw-bold">Warna</label>
                                <div id="colour-container">
                                    <!-- Tambahan warna akan muncul di sini -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addWarna()">+ Tambah Warna</button><br><br>
                            </div>
                            <div class="mb-3">
                                <label for="buying_price" class="form-label fw-bold">Harga Beli</label>
                                <input type="number" class="form-control" id="buying_price" name="buying_price" required>
                            </div>
                            <div class="mb-3">
                                <label for="selling_price" class="form-label    fw-bold">Harga Jual</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan & Lanjut</button>
                            <a href="{{ route('items.details', 1) }}" class="btn btn-danger">Batal</a>
                        </form>
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
@endsection