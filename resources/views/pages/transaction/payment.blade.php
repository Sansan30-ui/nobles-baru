<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>checkout</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



    <!-- Bootstrap core CSS -->
    <link href="/css/checkout/bootstrap.min.css" rel="stylesheet">
    <link href="img/shop/image.png" rel='shortcut icon'>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->



    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/style.css') }}" />

    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Custom styles for this template -->
    <!-- <link href="../checkout/form-validation.css" rel="stylesheet"> -->
</head>



<body class="bg-light">
    {{-- {{ dd($jumlah_barang) }} --}}
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout</h2>
                <p><strong>................</strong></p>
            </div>

            <form class="needs-validation" novalidate action="/checkout" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-5">
                    {{-- {{ dd($keranjang) }} --}}
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-dark">cart</span>
                            <!-- <span class="badge bg-primary rounded-pill">3</span> -->
                        </h4>

                        <ul class="list-group mb-3">
                            @foreach ($keranjang as $p)
                                <li class="list-group-item d-flex justify-content-between lh-sm mb-3">
                                    <div>
                                        <h6 style="font-size:15px" class="my-1" name="produk">
                                            {{ $p->barang->nama }}
                                        </h6>
                                        <h6>{{ $p->barang_id }}</h6>
                                        <input type="hidden" name="ids[]" value="{{ $p->barang_id }}">

                                        <input type="hidden" type="text"name="ukuran[]" value="{{ $p->ukuran }}">

                                    </div>
                                    <input type="hidden" class=" fw-bold" value="{{ $p->barang->harga }}"
                                        name="harga[]">



                                </li>


                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">Total</span>
                                    <strong>.............</strong>
                                </li>
                            @endforeach

                            <input type="hidden" name="xl" value="{{ $jumlah_barang['XL'] }}">
                            <input type="hidden" name="l" value="{{ $jumlah_barang['L'] }}">
                            <input type="hidden" name="m" value="{{ $jumlah_barang['M'] }}">
                            <input type="hidden" name="s" value="{{ $jumlah_barang['S'] }}">
                        </ul>

                    </div>

                    <div class="col-md-7 col-lg-8">

                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="id"
                                placeholder="" value="" name="id" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>




                        <div class="col-sm-12">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="nama" placeholder="" value="KKIHJHJ" name="nama" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>



                        <div class="col-12">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" placeholder="" value="87969" name="no_hp" required>
                            <div class="invalid-feedback">
                                Valid Nomor is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="AWDADW@ADWD.AWDA" id="email" placeholder="you@example.com" name="email"
                                required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>




                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" name="alamat" value="DAWDAWD" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('total_harga') is-invalid @enderror"
                                id="total_harga" placeholder="" value="" name="total_harga" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="status" class="form-label"></label>
                            <input type="hidden" class="form-control" id="status" value="belum dibayar"
                                name="status" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <label class="my -6" for="jenis_pembayaran" class="form-label">Metode
                            Pembayaran</label>

                        <div class="my 1">
                            <div class="form-check">
                                <input id="credit" name="jenis_pembayaran" type="radio" value="BRI"
                                    class="form-check-input @error('jenis_pembayaran') is-invalid @enderror" checked
                                    required>
                                <label class="badge form-check-label bg-secondary" for="credit">BRI</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="jenis_pembayaran" type="radio" value="BCA"
                                    class="form-check-input @error('jenis_pembayaran') is-invalid @enderror" required>
                                <label class="badge form-check-label bg-secondary" for="debit">BCA</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="jenis_pembayaran" type="radio" value="MANDIRI"
                                    class="form-check-input @error('jenis_pembayaran') is-invalid @enderror" required>
                                <label class="badge form-check-label bg-secondary" for="paypal">MANDIRI</label>
                            </div>
                        </div>
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Lanjutkan
                            Checkout</button>
                    </div>
            </form>



    </div>
    </div>
    </main>






    <!-- <script src="js/checkout/form-validation.js"></script> -->
</body>

</html>