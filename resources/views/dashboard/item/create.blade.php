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
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Haji">Haji</option>
                                    <option value="Haji">Jilbab</option>
                                    <option value="Haji">Aksesoris</option>
                                    {{-- @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ukuran</label>
                                <div id="size-container">
                                    <!-- Tambahan size akan muncul di sini -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSize()">+ Tambah Ukuran</button><br><br>

                                <label class="form-label">Warna</label>
                                <div id="colour-container">
                                    <!-- Tambahan warna akan muncul di sini -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addWarna()">+ Tambah Warna</button><br><br>
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
        input.name = 'sizes[]';
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