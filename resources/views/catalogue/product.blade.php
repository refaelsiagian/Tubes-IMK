@extends('catalogue.layout.main')

@section('content')
        <!-- breadcrumb -->
        <div class="tf-breadcrumb">
            <div class="container">
                <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                    <div class="tf-breadcrumb-list">
                        <a href="{{ route('catalogue.index') }}" class="text">Beranda</a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="{{ route('catalogue.categoryDetail', $product->category->category_slug) }}" class="text">{{ $product->category->category_name }}</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text">{{ $product->item_name }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->

        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="carousel-wrapper">
                              <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img src="{{ asset('catalogue/images/products/orange-1.jpg') }}" class="gambar-produk" alt="Product 1">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="{{ asset('catalogue/images/products/white-1.jpg') }}" class="gambar-produk" alt="Product 2">
                                  </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-title">
                                        <h5>{{ $product->item_name }}</h5>
                                    </div>

                                    <div class="tf-product-info-price">
                                        <div class="price">Rp{{ number_format($product->selling_price, 0, ',', '.') }}</div>
                                    </div>

                                    @php
                                        $details = $product->details;
                                        $groupedByColour = $details->groupBy('colour')->filter(fn($group) => $group->first()->colour !== null);
                                        $groupedBySize = $details->groupBy('size')->filter(fn($group) => $group->first()->size !== null);

                                        $hasColour = $details->pluck('colour')->filter()->isNotEmpty();
                                        $hasSize = $details->pluck('size')->filter()->isNotEmpty();
                                        $totalStock = $details->sum('stock');
                                    @endphp

                                    <div class="tf-product-info-stock mb-3">
                                        <div class="stock-count">{{ $totalStock }}</div>
                                        <p class="fw-6">Produk tersedia</p>
                                    </div>

                                    <div class="tf-product-info-variant-picker mt-4">
                                        @if ($hasColour && $hasSize)
                                            {{-- Ada warna + ukuran --}}
                                            @foreach ($groupedByColour as $colour => $variants)
                                                <div class="variant-colour mb-3">
                                                    <div class="variant-colour-label">
                                                        {{ ucfirst($colour) }}
                                                    </div>
                                                    <div class="ms-2">
                                                        @foreach ($variants as $variant)
                                                            <div class="d-flex justify-content-between small text-muted mb-1">
                                                                <span>{{ strtoupper($variant->size) }}</span>
                                                                <span>{{ $variant->stock }} pcs tersedia</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach

                                        @elseif (!$hasColour && $hasSize)
                                            {{-- Hanya ukuran --}}
                                            @foreach ($groupedBySize as $size => $variants)
                                                @php
                                                    $stock = $variants->sum('stock');
                                                @endphp
                                                <div class="d-flex justify-content-between small text-muted mb-2">
                                                    <span>{{ strtoupper($size) }}</span>
                                                    <span>{{ $stock }} pcs tersedia</span>
                                                </div>
                                            @endforeach

                                        @elseif ($hasColour && !$hasSize)
                                            {{-- Hanya warna --}}
                                            @foreach ($groupedByColour as $colour => $variants)
                                                @php
                                                    $stock = $variants->sum('stock');
                                                @endphp
                                                <div class="variant-colour mb-3">
                                                    <div class="variant-colour-label">
                                                        {{ ucfirst($colour) }}
                                                    </div>
                                                    <div class="ms-2 small text-muted">
                                                        {{ $stock }} pcs tersedia
                                                    </div>
                                                </div>
                                            @endforeach

                                        @else
                                            {{-- Tidak ada varian --}}
                                            <p class="mt-2 text-muted">Produk ini tidak memiliki varian khusus.</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- tabs -->
        <section class="flat-spacing-17 pt_0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Description</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        <p class="mb_30">
                                            {{ $product->item_description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /tabs -->

@endsection

@section('script')
    <script type="text/javascript" src="js/drift.min.js"></script>
    <script type="module" src="js/model-viewer.min.js"></script>
    <script type="module" src="js/zoom.js"></script>
@endsection