<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />

    <title>Cart</title>
    <style>
        @media (min-width: 1025px) {

            .h-custom {
                height: 100vh !important;
            }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        @media (min-width: 992px) {
            .card-registration-2 .bg-grey {
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        @media (max-width: 991px) {
            .card-registration-2 .bg-grey {
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }
    </style>
</head>


<body>
    {{-- {{ dd(count($keranjang)) }} --}}
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Keranjang Belanja</h1>
                                            {{-- <h6 class="mb-0 text-muted">3 items</h6> --}}
                                        </div>
                                        @if (count($keranjang) === 0)
                                            <div class="text-center">
                                                keranjang kosong
                                            </div>
                                        @else
                                            @foreach ($keranjang as $item)
                                                <hr class="my-4">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img width="100px"
                                                            src="{{ asset('images/' . $item->barang->gambar[0]) }}"
                                                            alt="gambar barang">

                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">{{ $item->barang->jenis }}</h6>
                                                        <h6 class="text-muted">ukuran : {{ $item->ukuran }}</h6>
                                                        <h6 class="text-black mb-0">{{ $item->barang->nama }}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex text-center">


                                                        <label id="form1" min="1" name="quantity"
                                                            type="number" class="">{{ $item->jumlah }}</label>


                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">
                                                            {{ 'Rp ' . number_format($item->barang->harga, 0, ',', '.') }}
                                                        </h6>
                                                    </div>

                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <div class="button">
                                                            <form action="{{ url('cart/' . $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit"> <a href="#!"
                                                                        class="text-muted"><i
                                                                            class="fas fa-times"></i></a></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="/produk" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Kembali Belanja
                                                    </a>
                                                </h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 bg-grey">
                                    <form action="{{ url('payment/' . auth()->user()->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        @if (count($keranjang) === 0)
                                            <div class="p-5">
                                                <h3 class="fw-bold mb-5 mt-2 pt-1">Detail Pesanan</h3>
                                                <hr class="my-4">

                                                <input type="hidden" name="" id="" value="">
                                                <input type="hidden" name="" id="" value="">

                                                <div class="d-flex justify-content-between mb-4">
                                                    <h5 class="text-uppercase"></h5>
                                                    <h5>
                                                    </h5>
                                                </div>
                                                <input type="hidden" name="" value="">

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Total price</h5>

                                                    <h5>Rp. 0</h5>

                                                </div>

                                                <button disabled type="submit" class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Checkout</button>

                                            </div>
                                        @else
                                            <div class="p-5">
                                                <h3 class="fw-bold mb-5 mt-2 pt-1">Detail Pesanan</h3>
                                                <hr class="my-4">
                                                @foreach ($keranjang as $key => $item)
                                                    <input type="hidden" name="barang_id[]" id=""
                                                        value="{{ $item->barang_id }}">
                                                    <input type="hidden" name="keranjang_id[]" id=""
                                                        value="{{ $item->id }}">
                                                    <div class="d-flex justify-content-between mb-4">
                                                        <h5 class="text-uppercase">{{ $item->barang->nama }}</h5>
                                                        <h5>Rp.
                                                            {{ number_format($hargaItem[] = $item->barang->harga * $item->jumlah) }}
                                                        </h5>
                                                    </div>
                                                    <input type="hidden"
                                                        name="barang_id[{{ $key }}][{{ $item->ukuran }}]"
                                                        value="{{ $item->jumlah }}">
                                                @endforeach
                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Total price</h5>
                                                    @php
                                                        $total = 0;
                                                        foreach ($hargaItem as $value) {
                                                            // Artinya adalah : $value = $value+$item->barang->harga;
                                                            $total = $total + $value;
                                                        }
                                                    @endphp
                                                    <h5>Rp. {{ number_format($total) }}</h5>

                                                </div>

                                                <button type="submit" class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Checkout</button>

                                            </div>
                                        @endif

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</body>

</html>
