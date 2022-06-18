@extends('layouts.user')
@section('content')
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($product as $item)
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
                                <img src=" {{ asset('images/' . $item->gambar) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $item->nama }}
                                </h5>
                                <h5>
                                    {{ $item->ukuran }}
                                </h5>
                                <h5>
                                    {{ $item->jenis }}
                                </h5>
                                <h5>
                                    {{ $item->deskirpsi }}
                                </h5>
                                <h6>
                                    {{ $item->harga }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Men's Shirt
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p1.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Men's Shirt
                            </h5>
                            <h6>
                                $75
                            </h6>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="btn-box">
                <a href="">
                    View All products
                </a>
            </div>
        </div>
    </section>
    <!-- end product section -->
@endsection
