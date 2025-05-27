@extends('dashboard.layout.main')

@section('style')

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">

    <style>
    .lihat-overlay {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(0, 0, 0, 0.4);
        color: white;
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .lihat-overlay:hover {
        color: skyblue;
        background: rgba(0, 0, 0, 0.7);
    }
    </style>

@endsection

@section('content')

<div class="page-heading">
    <h3>Kategori</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Tambah Kategori
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-light-success color-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-light-danger color-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="item-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah Barang</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_description }}</td>
                                            <td>{{ $category->items_count }}</td>
                                            <td>
                                                @if ($category->category_image)
                                                    <div style="position: relative; display: inline-block;">
                                                        <img src="{{ asset('storage/' . $category->category_image) }}" alt="Category Image" class="img-fluid" style="max-width: 100px; height: auto;">

                                                        <a href="{{ asset('storage/' . $category->category_image) }}" target="_blank" class="lihat-overlay">
                                                            Lihat
                                                        </a>
                                                    </div>                                                
                                                @else
                                                    <span class="text-muted">Tidak ada gambar. Gambar default ditampilkan</span>
                                                @endif
                                            </td>
                                            <td class="gap-2" style="white-space: nowrap">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                                    Edit
                                                </button>

                                                <!--Edit form Modal -->
                                                <div class="modal modal-borderless fade text-left" id="editModal{{ $category->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel33">Edit Nama Kategori</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                                                                    <input type="hidden" name="old_category_name" value="{{ $category->category_name }}">
                                                                    <label for="category_name" class="form-label">Kategori</label>
                                                                    <div class="form-group">
                                                                        <input id="category_name" type="text" name="category_name" value="{{ $category->category_name }}" placeholder="Masukkan Kategori"
                                                                            class="form-control" required autofocus>
                                                                    </div>
                                                                    <label for="category_description" class="form-label">Deskripsi (Maks. 200 Karakter)</label>
                                                                    <div class="form-group">
                                                                        <input id="category_description" type="text" name="category_description" value="{{ $category->category_description }}" placeholder="Masukkan deskripsi"
                                                                            class="form-control" maxlength="200" required>
                                                                    </div>
                                                                    <label for="category_image" class="form-label">Gambar</label>
                                                                    <div class="form-group">
                                                                        @if ($category->category_image)
                                                                        <img src="{{ asset('storage/' . $category->category_image) }}" alt="Category Image" class="img-fluid mt-2 mb-2" style="max-width: 100px;">
                                                                        @endif
                                                                        <input type="file" class="image-preview-filepond" name="category_image" data-max-file-size="1MB">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ms-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Simpan</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($category->items_count > 0)
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Masih memiliki barang">
                                                        Hapus
                                                    </button>
                                                @else
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
                                                    Hapus
                                                </button>

                                                <!--Confirm delete Modal -->
                                                <div class="modal modal-borderless fade text-left" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel33">Konfirmasi</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-body">
                                                                    <p>Apakah anda yakin ingin menghapus kategori ini?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger ms-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Hapus</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
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



<!--Create form Modal -->
<div class="modal modal-borderless fade text-left" id="inlineForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Kategori</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                    <label for="category_name" class="form-label">Kategori</label>
                    <div class="form-group">
                        <input id="category_name" type="text" name="category_name" placeholder="Masukkan Kategori"
                            class="form-control" required autofocus>
                    </div>
                    <label for="category_description" class="form-label">Deskripsi (Maks. 200 karakter)</label>
                    <div class="form-group">
                        <input id="category_description_add" type="text" name="category_description" placeholder="Masukkan deskripsi"
                            class="form-control" maxlength="200" required>
                    </div>
                    <label for="category_image" class="form-label">Gambar</label>
                    <div class="form-group">
                        <input type="file" class="image-preview-filepond" name="category_image" data-max-file-size="1MB" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
    {{-- <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script> --}}

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
  document.addEventListener("DOMContentLoaded", function() {
    const categoryInput = document.getElementById('category_description_add');
    const counter = document.getElementById('category_description_counter');

    categoryInput.addEventListener('input', function() {
      const length = categoryInput.value.length;

      if (length > 0) {
        counter.style.display = 'block';
        counter.textContent = `${length} karakter`;
      } else {
        counter.style.display = 'none';
      }
    });

    // Optional: jika sudah ada value dari database, langsung munculkan counter
    if (categoryInput.value.trim().length > 0) {
      counter.style.display = 'block';
      counter.textContent = `${categoryInput.value.length} karakter`;
    }
  });
</script>

@endsection