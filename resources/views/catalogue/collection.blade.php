@extends('catalogue.layout.main')

@section('content')
        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">Semua Koleksi</div>
                <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of Fashion</p> 
            </div>
        </div>
        <!-- /page-title -->
        
        <!-- Section Product -->
        <section class="flat-spacing-2">
            <div class="container">
                <div class="tf-shop-control d-flex justify-content-center">
                    <ul class="tf-control-layout d-flex justify-content-center">
                        <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                            <div class="item"><span class="icon icon-grid-2"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                            <div class="item"><span class="icon icon-grid-3"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                            <div class="item"><span class="icon icon-grid-4"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                            <div class="item"><span class="icon icon-grid-5"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                            <div class="item"><span class="icon icon-grid-6"></span></div>
                        </li>
                    </ul>
                    <div class="tf-control-sorting d-flex justify-content-end"></div>
                </div>
                <div class="grid-layout wrapper-shop" data-grid="grid-4">
                    @foreach($items as $item)
                        <div class="card-product fl-item">
                            <div class="card-product-wrapper">
                                <a href="{{ route('catalogue.productDetail', $item->item_slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ asset($item->main_image) }}" src="{{ asset($item->main_image) }}" alt="image-product">
                                    <img class="lazyload img-hover" data-src="{{ asset($item->hover_image) }}" src="{{ asset($item->hover_image) }}" alt="image-product">
                                </a>
                                <div class="click-here">
                                    <span>Lihat Produk</span>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('catalogue.productDetail', $item->item_slug) }}" class="title link">{{ $item->item_name }}</a>
                                <span class="price">Rp{{ number_format($item->selling_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- <!-- pagination -->
                <ul class="tf-pagination-wrap tf-pagination-list">
                    <li class="active">
                        <a href="#" class="pagination-link">1</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">2</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">3</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">4</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">
                            <span class="icon icon-arrow-right"></span>
                        </a>
                    </li>
                </ul> --}}
            </div>
        </section>
        <!-- /Section Product -->
@endsection

@section('additional')

    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /gotop -->


@endsection

@section('script')

<script type="text/javascript" src="js/rangle-slider.js"></script>


@endsection