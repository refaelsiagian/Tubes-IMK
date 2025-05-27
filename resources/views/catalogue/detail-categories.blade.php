@extends('catalogue.layout.main')

@section('content')
        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center">{{ $category->category_name }}</div>
                <p class="text-center text-2 text_black-2 mt_5">{{ $category->category_description }}</p> 
            </div>
        </div>
        
        <!-- Section Product -->
        <section class="flat-spacing-2">
            <div class="container">
                <div class="tf-shop-control grid-3 align-items-center">
                    <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a>
                    </div>
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
                    <!-- card product 1 -->
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

                <!-- pagination -->
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
                </ul>
            </div>
        </section>
@endsection

@section('additional')
    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>

    <!-- Filter -->
    <div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <div class="filter-icon">
                    <span class="icon icon-filter"></span>
                    <span>Filter</span>
                </div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body">
                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                        <span>Kategori</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="categories" class="collapse show">
                        <ul class="list-categoris current-scrollbar mb_36">
                            <li class="cate-item"><a href="detail-categories.html"><span>Aksesoris Hijab</span></a></li>
                            <li class="cate-item"><a href="detail-categories.html"><span>Pashmina</span></a></li>
                            <li class="cate-item"><a href="detail-categories.html"><span>Hijab Instan</span></a></li>
                            <li class="cate-item"><a href="detail-categories.html"><span>Hijab Segi Empat</span></a></li>
                            <li class="cate-item"><a href="detail-categories.html"><span>Perlengkapan Haji</span></a></li>
                            <li class="cate-item"><a href="detail-categories.html"><span>Mukenah</span></a></li>
                        </ul>
                    </div>
                </div>
                <form action="#" id="facet-filter-form" class="facet-filter-form">
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                            <span>Stok Tersedia</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="availability" class="collapse show">
                            <ul class="tf-filter-group current-scrollbar mb_36">
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <input type="radio" name="availability" class="tf-check" id="availability-1">
                                    <label for="availability-1" class="label"><span>In stock</span>&nbsp;<span>(14)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <input type="radio" name="availability" class="tf-check" id="availability-2">
                                    <label for="availability-2" class="label"><span>Out of stock</span>&nbsp;<span>(2)</span></label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#color" data-bs-toggle="collapse" aria-expanded="true" aria-controls="color">
                            <span>Warna</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="color" class="collapse show">
                            <ul class="tf-filter-group filter-color current-scrollbar mb_36">
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="beige" class="label"><span>Beige</span>&nbsp;<span>(3)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="black" class="label"><span>Black</span>&nbsp;<span>(18)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="blue" class="label"><span>Blue</span>&nbsp;<span>(3)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="brown" class="label"><span>Brown</span>&nbsp;<span>(3)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="cream" class="label"><span>Cream</span>&nbsp;<span>(1)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="dark-beige" class="label"><span>Dark Beige</span>&nbsp;<span>(1)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="dark-blue" class="label"><span>Dark Blue</span>&nbsp;<span>(3)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                                    <label for="dark-green" class="label"><span>Dark Green</span>&nbsp;<span>(1)</span></label>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">
                            </ul>
                        </div>
                    </div>
                </form>    
            </div>
        </div>       
    </div>
@endsection

@section('script')
<script type="text/javascript" src="js/rangle-slider.js"></script>
@endsection
