@extends('layouts.user')
@section('content')
    <!-- slider section -->
    <section class="slider_section ">
        <div class="slider_bg_box">
            <img src="{{ asset('admin') }}/img/slider-bg.jpg" alt="">
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        <span>
                                            GRAND OPENING
                                        </span>
                                        <br>
                                        NOBLESEED!
                                    </h1>
                                    <p>
                                        Telah Hadir Web NOBLESEED.
                                    </p>
                                    <div class="btn-box">
                                        <a href="/produk" class="btn1">
                                            Belanja Sekarang!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Kalem Masih Keder.
                                    </p>
                                    <div class="btn-box">
                                        <a href="/produk" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- end slider section -->
    </div>
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    New <span>Products</span>
                </h2>
            </div>
            {{-- Searching --}}

            <div class="row justify-content-end">
                <div class="col-md-4">
                    <form action="/home">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari.." name="search"
                                value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                                    id="btn-search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="" class="option1">
                                        Keranjang
                                    </a>
                                    <a href="{{ url('detail/' . $item->id) }}" class="option2">
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                {{-- @dump($item->gambar[0]); --}}
                                <img src=" {{ asset('images/' . $item->gambar[0]) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $item->nama }}
                                </h5>
                                <h6>
                                    Rp. {{ number_format($item->harga) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="detail-box">
                <div class="btn-box">
                    <a class="btn1" href="/produk">
                        View All products
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end product section -->
    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div id="about" class="heading_container heading_center">
                <h2>
                    Tentang Kami
                </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box col-lg-10 mx-auto">
                            <div class="img_container">
                                <div class="img-box">
                                    <div class="img_box-inner">
                                        <img src="{{ asset('admin') }}/img/client.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Sansan
                                </h5>
                                <h6>
                                    CEO
                                </h6>
                                <p>
                                    Kata Noble Seed diambil dari Bahasa inggris yang artinya “Benih Mulia”, Bermakna pemuda
                                    unggul yang memiliki kualitas dan visi yang besar.
                                    Nobleseed murupakan salah satu merek apparel dari Indonesia yang dikembangkan oleh
                                    pemuda millenials kreatif dan inovatif. Di dalam sebuah merek apparel sebagai wujud
                                    nyata dalam memajukan produk local menuju internasional.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- end client section -->
@endsection
