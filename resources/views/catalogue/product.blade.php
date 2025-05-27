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
                            <div class="tf-product-media-wrap">
                                <div class="">
                                    <div class="d-flex flex-column gap-10">
                                        {{-- <a href="{{ asset('catalogue/images/products/'.$product->images->first()->filename) }}" target="_blank">
                                            <img class="gambar-produk" src="{{ asset('catalogue/images/products/'.$product->images->first()->filename) }}" alt="">
                                        </a> --}}
                                        <a href="{{ asset('catalogue/images/products/black-1.jpg')}}" target="_blank">
                                            <img class="gambar-produk" src="{{ asset('catalogue/images/products/black-1.jpg') }}" alt="">
                                        </a>
                                    </div>
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

                                    <div class="tf-product-info-stock">
                                        <div class="stock-count">{{ $totalStock }}</div>
                                        <p class="fw-6">Produk tersedia</p>
                                    </div>

                                    <div class="tf-product-info-variant-picker mt-3">
                                        @if ($hasColour && $hasSize)
                                            {{-- Ada warna + ukuran --}}
                                            @foreach ($groupedByColour as $colour => $variants)
                                                <div class="variant-colour mb-2">
                                                    <button type="button" class="btn-variant-colour mb-1" style="border: 1px solid #000; padding: 5px 10px; background: #f5f5f5;">
                                                        {{ ucfirst($colour) }}
                                                    </button>
                                                    @foreach ($variants as $variant)
                                                        <div class="d-flex justify-content-between align-items-center ms-3">
                                                            <span>{{ strtoupper($variant->size) }} :</span>
                                                            <span>{{ $variant->stock }} pcs tersedia</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach

                                        @elseif (!$hasColour && $hasSize)
                                            {{-- Hanya ukuran --}}
                                            @foreach ($groupedBySize as $size => $variants)
                                                @php
                                                    $stock = $variants->sum('stock');
                                                @endphp
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>{{ strtoupper($size) }} :</span>
                                                    <span>{{ $stock }} pcs tersedia</span>
                                                </div>
                                            @endforeach

                                        @elseif ($hasColour && !$hasSize)
                                            {{-- Hanya warna --}}
                                            @foreach ($groupedByColour as $colour => $variants)
                                                @php
                                                    $stock = $variants->sum('stock');
                                                @endphp
                                                <div class="variant-colour mb-2">
                                                    <button type="button" class="btn-variant-colour mb-1" style="border: 1px solid #000; padding: 5px 10px; background: #f5f5f5;">
                                                        {{ ucfirst($colour) }}
                                                    </button>
                                                    <div class="ms-3">
                                                        {{ $stock }} pcs tersedia
                                                    </div>
                                                </div>
                                            @endforeach

                                        @else
                                            {{-- Tidak ada varian --}}
                                            <p class="mt-2">Produk ini tidak memiliki varian khusus.</p>
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