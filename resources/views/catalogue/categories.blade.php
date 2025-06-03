@extends('catalogue.layout.main')

@section('content')
    <!-- title -->
    <div class="tf-page-title">
        <div class="container-full">
        <div class="heading text-center">Kategori</div>
        <p class="text-center text-2 text_black-2 mt_5">
            Pilih kategori favorit dan temukan produk yang kamu suka
        </p>
        </div>
    </div>
    <!-- end title -->

    @foreach($categories as $category)
    <section class="flat-spacing-4 flat-categorie">
        <div class="container-full">
            <div class="flat-title-v2">
                <div class="box-sw-navigation">
                    <div class="nav-sw nav-prev-collection aksesoris-prev"><span class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-next-collection aksesoris-next"><span class="icon icon-arrow-right"></span></div>
                </div>
                {{-- category name in all capital --}}
                <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s">{{ ucfirst($category->category_name) }}</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div dir="ltr" class="swiper tf-sw-collection" data-preview="5" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                        @php
                            //get 6 latest items from the category
                            $items = $category->items()->latest()->take(6)->get();

                            foreach ($items as $item) {
                                $images = $item->images->filter(fn($img) => $img->image_name !== null)->values(); // Filter yang ada
                                $item->main_image = $images->get(0) ? 'storage/' . $images->get(0)->image_name : 'catalogue/images/products/orange-1.jpg';
                                $item->hover_image = $images->get(1) ? 'storage/' . $images->get(1)->image_name : 'catalogue/images/products/white-1.jpg';
                            }
                        @endphp
                        <div class="swiper-wrapper">
                            @foreach($items as $item)
                                <div class="swiper-slide" lazy="true">
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
                                </div>
                            @endforeach
                        </div>
                        {{-- tombol "lihat selengkapnya" --}}
                        <div class="custom-load-more-wrapper">
                            <a href="{{ route('catalogue.categoryDetail', $category->category_slug) }}" class="custom-animate-hover-btn">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>
    @endforeach
@endsection
        

