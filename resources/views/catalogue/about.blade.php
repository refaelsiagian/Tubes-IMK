@extends('catalogue.layout.main')

@section('content')
    <div class="tf-page-title">
        <div class="container-full">
        <div class="heading text-center">Temukan Kami</div>
        <p class="text-center text-2 text_black-2 mt_5">
            Lokasi dan cara menghubungi kami dengan mudah
        </p>
        </div>
    </div>

    <!-- Our Store -->
    <section class="flat-spacing-16">
        <div class="container">
            <div class="tf-grid-layout md-col-2">
                <div class="tf-ourstore-img">
                    <img class="lazyload" data-src="{{ asset('catalogue/images/shop/gallery/ourstore2.png') }}" src="{{ asset('catalogue/images/shop/gallery/ourstore2.png') }}" alt="our-store">
                </div>
                <div class="tf-ourstore-content">
                    <h5 class="mb_24">SHABRINA</h5>
                    <div class="mb_20">
                        <p class="mb_15"><strong>Kunjungi Toko Kami</strong></p>
                        <p>Untuk melakukan pembelian, silakan datang langsung ke toko kami. 
                            Saat ini, pemesanan atau pembelian belum tersedia secara online 
                            melalui website ini.</p>
                    </div>
                    <div class="mb_20">
                        <p class="mb_15"><strong>WhatsApp</strong></p>
                        <p><a href="https://wa.me/6285276799470"><strong>+62 852-7679-9470</strong></a></p>
                    </div>
                    <div class="mb_20">
                        <p class="mb_15"><strong>Alamat</strong></p>
                        <p>Masjid Agung, Jl. Soekarno Hatta, Timbang Langkat,  Kec. Binjai Tim., 
                        Kota Binjai, Sumatera Utara 20735</p>
                    </div>
                    <div class="mb_36">
                        <p class="mb_15"><strong>Jam Operasional</strong></p>
                        <p class="mb_15">Senin - Sabtu </p>
                        <p>08.00 - 17.00</p>
                    </div>
                    <div class="mb_30">
                        <ul class="tf-social-icon d-flex gap-15 style-default">
                            <li><a href="#" class="box-icon link round social-facebook border-line-black"><i class="icon fs-16 icon-fb"></i></a></li>
                            <li><a href="#" class="box-icon link round social-instagram border-line-black"><i class="icon fs-16 icon-instagram"></i></a></li>
                            <li><a href="#" class="box-icon link round social-tiktok border-line-black"><i class="icon fs-16 icon-tiktok"></i></a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="https://maps.app.goo.gl/GiCwFtEP5J17yiqr5" class="tf-btn btn-outline-dark radius-3"><span>Lihat Lokasi</span><i class="icon icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection