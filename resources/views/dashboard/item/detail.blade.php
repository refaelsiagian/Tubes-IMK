@extends('dashboard.layout.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    <style>
        .readonly {
        background-color: #e9ecef;      /* abu-abu seperti Bootstrap disabled */
        cursor: not-allowed;            /* kursor dilarang (lingkaran merah silang) */
        pointer-events: none;           /* opsional: benar-benar non-interaktif */
        }
    </style>
@endsection

@section('content')

<div class="page-heading">
    <h3>Detail Barang</h3>
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
                                <input type="text" class="form-control readonly" value="Hijab Jilbab" id="name" name="name" required readonly>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="image1" class="form-label">Foto </label>
                                    <input type="file" class="image-preview-filepond" id="image1" name="image1[]" multiple>
                                </div>
                                {{-- <div class="col-md-4">
                                    <label for="image2" class="form-label">Foto 2</label>
                                    <input type="file" class="image-preview-filepond" id="image2" name="image2[]" multiple>
                                </div>
                                <div class="col-md-4">
                                    <label for="image2" class="form-label">Foto 3</label>
                                    <input type="file" class="image-preview-filepond" id="image2" name="image2[]" multiple>
                                </div> --}}
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga (Rp)</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="st" name="price" required>
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
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
@endsection