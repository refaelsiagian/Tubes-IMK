@extends('catalogue.layout.main')

@section('content')
        <!-- breadcrumb -->
        <div class="tf-breadcrumb">
            <div class="container">
                <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                    <div class="tf-breadcrumb-list">
                        <a href="index.html" class="text">Beranda</a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="#" class="text">Pashmina</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text">Pashmina Hanna Polos</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->

        <!-- default -->
        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                          <div class="col-md-6">
                            <div class="tf-product-media-wrap">
                                <div class="">
                                    <div class="d-flex flex-column gap-10">
                                        <a href="images/products/black-1.jpg" target="_blank">
                                            <img class="gambar-produk" src="images/products/black-1.jpg" alt="">
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
                                        <h5>Pashmina Hanna Polos</h5>
                                    </div>
                                    <div class="tf-product-info-price">
                                        <div class="price">Rp 30.000</div>
                                    </div>
                                    <div class="tf-product-info-stock">
                                        <div class="stock-count">27</div>
                                        <p class="fw-6">Produk tersedia</p>
                                    </div>                                    
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                                Pilihan Warna :
                                            </div>
                                            <div class="tf-dropdown-sort full position-relative" data-bs-toggle="dropdown">
                                                <div class="btn-select">
                                                    <span class="text-sort-value">Featured</span>
                                                    <span class="icon icon-arrow-down"></span>
                                                </div>
                                                <div class="dropdown-menu">
                                                    <div class="select-item">
                                                        <span class="text-value-item">Light Purple</span>
                                                    </div>
                                                    <div class="select-item">
                                                        <span class="text-value-item">Light Green</span>
                                                    </div>
                                                                                                        <div class="select-item">
                                                        <span class="text-value-item">Light Purple</span>
                                                    </div>
                                                    <div class="select-item">
                                                        <span class="text-value-item">Light Green</span>
                                                    </div>
                                                                                                        <div class="select-item">
                                                        <span class="text-value-item">Light Purple</span>
                                                    </div>
                                                    <div class="select-item">
                                                        <span class="text-value-item">Light Green</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="variant-picker-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="variant-picker-label">
                                                    Pilihan Ukuran :
                                                </div>
                                            </div>
                                            <div class="tf-dropdown-sort full position-relative" data-bs-toggle="dropdown">
                                                <div class="btn-select">
                                                    <span class="text-sort-value">M</span>
                                                    <span class="icon icon-arrow-down"></span>
                                                </div>
                                                <div class="dropdown-menu">
                                                    <div class="select-item active">
                                                        <span class="text-value-item">M</span>
                                                    </div>
                                                    <div class="select-item">
                                                        <span class="text-value-item">L</span>
                                                    </div>
                                                    <div class="select-item">
                                                        <span class="text-value-item">XL</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /default -->

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
                                            Button-up shirt sleeves and a relaxed silhouette. It’s tailored with drapey,
                                            crinkle-texture fabric that’s made from LENZING™ ECOVERO™ Viscose — responsibly
                                            sourced wood-based
                                            fibres produced through a process that reduces impact on forests, biodiversity and
                                            water supply.
                                        </p>
                                        <div class="tf-product-des-demo">
                                            <div class="right">
                                                <h3 class="fs-16 fw-5">Features</h3>
                                                <ul>
                                                  <li>Front button placket</li>
                                                  <li> Adjustable sleeve tabs</li>
                                                  <li>Babaton embroidered crest at placket and hem</li>
                                                </ul>
                                            </div>
                                            <div class="left">
                                              <h3 class="fs-16 fw-5">Materials Care</h3>
                                                <ul class="mb-0">
                                                  <li>Content: 100% LENZING™ ECOVERO™ Viscose</li>
                                                  <li>Care: Hand wash</li>
                                                  <li>Imported</li>
                                                </ul>
                                              </div>
                                        </div>
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