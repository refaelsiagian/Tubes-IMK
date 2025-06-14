@extends('dashboard.layout.main')

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

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Barang</label>
                            <p class="form-control-plaintext">{{ $item->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Barang</label>
                            <p class="form-control-plaintext">{{ $item->item_name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <p class="form-control-plaintext">{{ $item->category->category_name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <p class="form-control-plaintext">{{ $item->item_description }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Ukuran</label>
                            @if ($sizes[0] != null)
                                <ul>
                                    @foreach($sizes as $size)
                                        <li>{{ $size }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="form-control-plaintext">Barang ini tidak memiliki ukuran khusus.</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Warna</label>
                            @if ($colours->isNotEmpty())
                                <ul>
                                    @foreach($colours as $colour)
                                        <li>{{ $colour }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="form-control-plaintext">Barang ini tidak memiliki varian warna.</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Harga Beli</label>
                            <p class="form-control-plaintext">Rp {{ number_format($item->buying_price, 0, ',', '.') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Harga Jual</label>
                            <p class="form-control-plaintext">Rp {{ number_format($item->selling_price, 0, ',', '.') }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Umum</label>
                            @if ($image_general->count() > 0 && $image_general->whereNotNull('image_name')->count() > 0)
                                <div class="row">
                                    @foreach($image_general as $image)
                                        @if ($image->image_name)
                                            <div class="col-md-3 mb-3">
                                                <img src="{{ asset('storage/' . $image->image_name) }}" class="img-fluid" alt="Foto Umum">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <p class="form-control-plaintext">Foto belum ditambahkan.</p>
                            @endif
                        </div>

                        @if ($colours->isNotEmpty())
                            <div class="mb-3">
                                <label class="form-label fw-bold">Foto per Warna</label>
                                @if ($image_colour->isNotEmpty())
                                    <div class="row">
                                        @foreach ($image_colour as $colour)
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">{{ $colour->colour }}</label>
                                                @if ($colour->image_name)
                                                    <img src="{{ asset('storage/' . $colour->image_name) }}" class="img-fluid" alt="Foto Warna">
                                                @else
                                                    <p class="form-control-plaintext">Foto belum ditambahkan.</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="form-control-plaintext">Foto belum ditambahkan.</p>
                                @endif
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Stok</label>
                            @if ($details->count() > 0)
                                @if ($colours->isNotEmpty() || $sizes[0] != null)
                                    <ul>
                                        @foreach ($details as $detail)
                                            <li>{{ $detail->colour }} {{ $detail->size }}: {{ $detail->stock }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="form-control-plaintext">{{ $details->first()->stock }}</p>
                                @endif
                            @else
                                <p class="form-control-plaintext">Tidak ada data stok tersedia.</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pengingat Stok Minimum</label>
                            <p class="form-control-plaintext">{{ $item->limit_stock }}</p>
                        </div>

                        <a href="{{ route('item.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

