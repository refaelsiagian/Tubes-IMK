@extends('dashboard.layout.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <style>
        .readonly {
        background-color: #e9ecef;      /* abu-abu seperti Bootstrap disabled */
        cursor: not-allowed;            /* kursor dilarang (lingkaran merah silang) */
        pointer-events: none;           /* opsional: benar-benar non-interaktif */
        }
        
        .image-wrapper {
            background-color: #000; /* Latar hitam */
            width: 100%; /* Full lebar container */
            overflow: hidden;
            border-radius: 8px; /* Opsional: sudut membulat */
            position: relative;
        }

        .image-actions .btn-action {
            background: rgba(255, 255, 255, 0.4); /* Transparan */
            color: black;
            border: none;
            margin-left: 5px;
            transition: color 0.3s ease;
        }

        .image-actions .btn-action:hover {
            color: #0d6efd; /* Bootstrap primary color saat hover */
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
                        @if (session('success'))
                            <div class="alert alert-light-success color-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('items.modify', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                <label for="name" class="form-label fw-bold">Nama Barang</label>
                                <input type="text" class="form-control readonly" value="{{ $item->item_name }}" id="name" name="name" required readonly>
                            </div>

                            <hr class="mb-5">

                            <div class="mb-3">
                                <label for="foto" class="form-label fw-bold h5">Foto</label>
                                <small class="text-muted">Maks. 1MB per foto.</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold h6">Umum</label>
                                <small class="text-muted">Maksimal 5. Minimal 2 agar barang dapat ditampilkan</small>
                            </div>
                            
                            <div class="row mb-3">
                                @foreach($image_general as $image)
                                    <div class="col-md-4">
                                        @if ($image->image_name == null)
                                            <input type="file" class="image-preview-filepond" name="image[{{ $image->id }}]" data-max-file-size="1MB">
                                        @else
                                            <div class="image-wrapper position-relative bg-dark d-flex align-items-center justify-content-center mb-3" style="height: 150px;">
                                                <img src="{{ asset('storage/' . $image->image_name) }}" style="max-height: 100%; max-width: 100%;" id="img-{{ $image->id }}" class="img-fluid" alt="Foto Umum">
                                                <div class="image-actions position-absolute top-0 end-0 p-1">
                                                    <button type="button" class="btn btn-sm btn-action" onclick="viewImage('{{ asset('storage/' . $image->image_name) }}')">Lihat</button>
                                                    <button type="button" class="btn btn-sm btn-action" onclick="removeImage({{ $image->id }})">Hapus</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <div>
                                <label for="image" class="form-label fw-bold h6">Warna</label>
                                <small class="text-muted">Tiap warna wajib memiliki gambar agar barang dapat ditampilkan</small>
                            </div>

                            @if ($image_colour->isNotEmpty())
                                <div class="row mb-5">
                                    @foreach ($image_colour as $colour)
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">{{ $colour->colour }}</label>
                                            
                                            @if ($colour->image_name == null)
                                                <input type="file" class="image-preview-filepond" value="null" name="image[{{ $colour->id }}]" data-max-file-size="1MB">
                                            @else
                                                <div class="image-wrapper position-relative bg-dark d-flex align-items-center justify-content-center" style="height: 150px;">
                                                    <img src="{{ asset('storage/' . $colour->image_name) }}" style="max-height: 100%; max-width: 100%;" id="img-{{ $colour->id }}" class="img-fluid" alt="Foto Warna">
                                                    <div class="image-actions position-absolute top-0 end-0 p-1">
                                                        <button type="button" class="btn btn-sm btn-action" onclick="viewImage('{{ asset('storage/' . $colour->image_name) }}')">Lihat</button>
                                                        <button type="button" class="btn btn-sm btn-action" onclick="removeImage('{{ $colour->id }}')">Hapus</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <hr class="mb-4">

                            <div class="mb-4 mt-5">
                                <label for="stock" class="form-label fw-bold h5">Tambahkan Stok</label>
                                <div class="row">
                                    @foreach ($details as $detail)
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">{{ $detail->colour }} {{ $detail->size }} (stok saat ini: {{ $detail->stock }})</label>
                                        <input type="number" class="form-control" id="stock" name="stock[{{ $detail->id }}]" min="0" placeholder="Penambahan stok" max="100" value="0" required>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="limit_stock" class="form-label fw-bold h5">Pengingat Stok</label>
                                <small class="text-muted">Jika stok kurang dari yang ditentukan akan diberi pengingat di dashboard.</small>
                                <input type="number" name="limit_stock" class="form-control" id="limit_stock" value="{{ $item->limit_stock }}" required min="0">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route(request()->get('from') === 'stock' ? 'dashboard.stock' : 'items.index') }}" class="btn btn-danger">Kembali</a>
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
    {{-- <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script> --}}

    <script>
        // Register plugin di awal
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageCrop,
            FilePondPluginImageFilter,
            FilePondPluginImageResize
        );

        // Set global options (boleh tetap)
        const filePondOptions = {
            credits: null,
            allowImagePreview: true,
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => resolve(type)),
            storeAsFile: true,
        };

        // Inisialisasi semua .image-preview-filepond
        document.querySelectorAll(".image-preview-filepond").forEach((input) => {
            FilePond.create(input, filePondOptions);
        });

        function viewImage(url) {
            window.open(url, '_blank');
        }

        function removeImage(id) {
            const imgElement = document.getElementById('img-' + id);
            const parentCol = imgElement.closest('.col-md-4');

            const wrapper = imgElement.closest('.image-wrapper');
            parentCol.removeChild(wrapper);

            const removeInput = document.createElement('input');
            removeInput.type = 'hidden';
            removeInput.name = 'remove_image[]';
            removeInput.value = id;
            parentCol.appendChild(removeInput);

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = `image[${id}]`;
            fileInput.classList.add('image-preview-filepond');
            fileInput.setAttribute('data-max-file-size', '1MB');
            parentCol.appendChild(fileInput);

            FilePond.create(fileInput, filePondOptions);
        }
    </script>

@endsection