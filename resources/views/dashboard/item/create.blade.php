@extends('dashboard.layout.main')

@section('style')
<style>
    input.form-control[readonly] {
        background-color: #d2d2d2;
        opacity: 1;
    }
</style>
@endsection



@section('content')

<div class="page-heading">
    <h3>Tambah Barang</h3>
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
                        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id" class="form-label fw-bold">ID Barang</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="item_name" class="form-label fw-bold">Nama Barang</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" value="{{ old('item_name') }}" required>
                                @if ($errors->has('item_name'))
                                    <span class="text-danger">{{ $errors->first('item_name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-bold">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        @if (old('category_id') == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="item_description" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" id="item_description" name="item_description" rows="3" required>{{ old('item_description') }}</textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-bold">Ukuran</label>
                                <div id="size-container">
                                    <!-- Tambahan size akan muncul di sini -->
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
                                <input type="number" class="form-control" id="buying_price" name="buying_price" value="{{ old('buying_price') }}" required max="9999999">
                            </div>
                            <div class="mb-3">
                                <label for="selling_price" class="form-label fw-bold">Harga Jual</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ old('selling_price') }}" required max="9999999">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan & Lanjut</button>
                            <a href="{{ route('items.index') }}" class="btn btn-danger">Batal</a>
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