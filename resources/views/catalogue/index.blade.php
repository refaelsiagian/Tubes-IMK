@extends('catalogue.layout.main')

@section('content')
        <!-- Slider -->
        <div class="tf-slideshow slider-effect-fade position-relative"> 
            <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-loop="true" data-auto-play="true" data-delay="0" data-speed="1000">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="wrap-slider">
                            <img src="{{ asset('catalogue/images/slider/fashion-slideshow-01.jpg')}}" alt="fashion-slideshow">
                            <div class="box-content">
                                <div class="container">
                                    <h2 class="fade-item fade-item-1">Hijab Stylish<br>untuk hari-harimu</h2>
                                    <p class="fade-item fade-item-2">Tampil anggun dan nyaman dengan pilihan hijab yang cocok untuk <br> aktivitas harianmu.</p>
                                    <a href="{{ route('catalogue.collection') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Koleksi Hijab</span><i class="icon icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wrap-slider">
                            <img src="{{ asset('catalogue/images/slider/fashion-slideshow-02.jpg')}}" alt="fashion-slideshow">
                            <div class="box-content">
                                <div class="container">
                                    <h2 class="fade-item fade-item-1">Gaya Hijab<br>Cerita Kamu</h2>
                                    <p class="fade-item fade-item-2">Temukan koleksi hijab yang bikin kamu makin percaya diri <br> Saatnya Tampil Menawan dengan Cara Sederhana</p>
                                    <a href="{{ route('catalogue.collection') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Koleksi Hijab</span><i class="icon icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wrap-slider">
                            <img src="{{ asset('catalogue/images/slider/fashion-slideshow-03.jpg')}}" alt="fashion-slideshow">
                            <div class="box-content">
                                <div class="container">
                                    <h2 class="fade-item fade-item-1">Hijab Trendi</h2>
                                    <p class="fade-item fade-item-2">Mix and match hijabmu, tetap syar'i dan modis</p>
                                    <a href="{{ route('catalogue.collection') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Koleksi Hijab</span><i class="icon icon-arrow-right"></i></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-pagination">
                <div class="container">
                    <div class="sw-dots sw-pagination-slider justify-content-center"></div>
                </div>
            </div>
        </div>
        <!-- /Slider -->

        <!-- Categories -->
        <section class="flat-spacing-4 flat-categorie">
            <div class="container-full">
               <div class="flat-title-v2">
                    <div class="box-sw-navigation">
                        <div class="nav-sw nav-prev-collection aksesoris-prev"><span class="icon icon-arrow-left"></span></div>
                        <div class="nav-sw nav-next-collection aksesoris-next"><span class="icon icon-arrow-right"></span></div>
                    </div>
                    <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s">Kategori Hijab</span>
               </div>
               <div class="row">
                    <div class="col-12">
                        <div dir="ltr" class="swiper tf-sw-collection" data-preview="4" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                            <div class="swiper-wrapper">
                                @foreach($categories as $category)
                                    <div class="swiper-slide" lazy="true">
                                        <div class="collection-item style-left hover-img">
                                            <div class="collection-inner">
                                                <a href="{{ route('catalogue.categoryDetail', $category->category_slug) }}" class="collection-image img-style">
                                                    @if($category->category_image)
                                                    <img class="lazyload" data-src="{{ asset('storage/' . $category->category_image) }}" src="{{ asset('storage/' . $category->category_image) }}" alt="collection-img">
                                                    @else
                                                    <img class="lazyload" data-src="{{ asset('catalogue/images/collections/collection-17.jpg') }}" src="{{ asset('catalogue/images/collections/default-collection.jpg') }}" alt="collection-img">
                                                    @endif
                                                </a>
                                                <div class="collection-content">
                                                    <a href="{{ route('catalogue.categoryDetail', $category->category_slug) }}" class="tf-btn collection-title hover-icon fs-15"><span>{{ $category->category_name }}</span><i class="icon icon-arrow1-top-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
               </div>              
            </div>
        </section>
        <!-- /Categories -->
         
        <!-- Seller -->
        <section class="flat-spacing-5 pt_0 flat-seller">
            <div class="container">
                <div class="flat-title">
                    <span class="title wow fadeInUp" data-wow-delay="0s">Produk Terlaris</span>
                    <p class="sub-title wow fadeInUp" data-wow-delay="0s">Pilihan favorit yang paling banyak diminati — jangan sampai kehabisan!</p>
                </div>
                <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                    <!-- card product 1 -->
                    @foreach($bests as $item)
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
                    {{-- <!-- card product 2 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 3 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 4 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 5 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 6 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 7 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 8 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 9 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 10 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 11 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/orange-1.jpg" src="images/products/orange-1.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/white-1.jpg" src="images/products/white-1.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Ribbed Tank Top</a>
                            <span class="price">$16.95</span>
                        </div>
                    </div>
                    <!-- card product 12 -->
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="#" class="product-img">
                                <img class="lazyload img-product" data-src="images/products/black-11.jpg" src="images/products/black-11.jpg" alt="image-product">
                                <img class="lazyload img-hover" data-src="images/products/black-12.jpg" src="images/products/black-12.jpg" alt="image-product">
                            </a>
                            <div class="click-here">
                                <span>Lihat Produk</span>
                            </div>
                        </div>
                        <div class="card-product-info">
                            <a href="#" class="title link">Slim Fit Fine-knit Turtleneck Sweater</a>
                            <span class="price">$18.95</span>
                            
                        </div>
                    </div> --}}
                </div>
                <div class="tf-pagination-wrap view-more-button text-center">
                    <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Tampilkan Lagi</span></button>
                </div>
            </div>
        </section>
        <!-- /Seller -->

        <!-- brand -->
        <section class="flat-spacing-5 pt_0">
            <div class="container">
                <div dir="ltr" class="swiper tf-sw-brand" data-loop="false" data-play="false" data-preview="6" data-tablet="3" data-mobile="2" data-space-lg="0" data-space-md="0">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <span class="brand-text">UMAMA</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <span class="brand-text">RABBANI</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <span class="brand-text">JILBRAVE</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <span class="brand-text">MUMTAZ</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <span class="brand-text">HUMAIRA</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <span class="brand-text">AULIA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-dots style-2 sw-pagination-brand justify-content-center"></div>
            </div>
        </section>
        <!-- /brand -->

        {{-- <!-- Shop Gram -->
        <section class="flat-spacing-7">
            <div class="container">
                <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                    <span class="title">Inspirasi gaya Hijab</span>
                    <p class="sub-title">Inspire and let yourself be inspired, from one unique fashion to another.</p>
                </div>
                <div class="wrap-carousel wrap-shop-gram">
                    <div dir="ltr" class="swiper tf-sw-shop-gallery" data-preview="5" data-tablet="3" data-mobile="2" data-space-lg="7" data-space-md="7">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".2s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover" data-src="images/shop/gallery/gallery-7.jpg" src="images/shop/gallery/gallery-7.jpg" alt="image-gallery">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".3s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover" data-src="images/shop/gallery/gallery-3.jpg" src="images/shop/gallery/gallery-3.jpg" alt="image-gallery">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".4s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover" data-src="images/shop/gallery/gallery-5.jpg" src="images/shop/gallery/gallery-5.jpg" alt="image-gallery">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".5s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover" data-src="images/shop/gallery/gallery-8.jpg" src="images/shop/gallery/gallery-8.jpg" alt="image-gallery">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-img wow fadeInUp" data-wow-delay=".6s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover" data-src="images/shop/gallery/gallery-6.jpg" src="images/shop/gallery/gallery-6.jpg" alt="image-gallery">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-dots sw-pagination-gallery justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Shop Gram --> --}}

@endsection
     
@section('additional')
    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /gotop -->

    <!-- auto popup -->
    <div class="modal modalCentered fade auto-popup modal-newleter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top">
                    <img class="lazyload" data-src="catalogue/images/item/banner-newleter.jpg" src="catalogue/images/item/banner-newleter.jpg" alt="Selamat Datang">
                    <span class="icon icon-close btn-hide-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-bottom text-center">
                    <h4>Selamat Datang di Toko Hijab Shabrina</h4>
                    <p>Kami menyediakan berbagai koleksi hijab terbaru dengan harga terjangkau dan kualitas terbaik.</p>
                    <div class="text-center mt-3">
                        <a href="#" data-bs-dismiss="modal" class="tf-btn btn-fill radius-3 w-100 btn-hide-popup">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /auto popup -->
@endsection