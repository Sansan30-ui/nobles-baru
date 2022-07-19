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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('status'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@elseif($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif




<body class="bg-light">
    {{-- {{ dd($jumlah_barang) }} --}}
    <div class="container">
        <main>
            <div class="py-5 text-center">
                {{-- <h2>Checkout</h2>
                <p><strong>................</strong></p> --}}
            </div>

            <form class="needs-validation" id="submit_form" novalidate action="/payment" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kode_pembayaran" value="{{ $kodeUnik }}">
                <div class="row g-5">
                    {{-- {{ dd($keranjang) }} --}}
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-dark">cart</span>

                        </h4>

                        <ul class="list-group mb-3" style="list-style-type: none">
                            <li class="list-group-item lh-sm mb-3">
                                @foreach ($keranjang as $key => $p)
                                    <div class="d-flex justify-content-between">
                                        <h6 style="font-size:15px" class="my-1" name="produk">
                                            {{ $p->barang->nama }}
                                        </h6>
                                        <h6>Rp
                                            {{ number_format($hargaItem[] = $p->barang->harga * $p->jumlah) }}</h6>
                                        <input type="hidden" name="ids[]" value="{{ $p->barang_id }}">

                                        <input type="hidden"
                                            type="text"name="ukuran[{{ $key }}][{{ $p->ukuran }}]"
                                            value="{{ $p->jumlah }}">

                                        <input type="hidden" class=" fw-bold" value="{{ $p->barang->harga }}"
                                            name="harga[]">
                                        <input type="hidden" class=" fw-bold" value="{{ $p->jumlah }}"
                                            name="jumlah[]">

                                        <input type="hidden" name="json" id="json_callback">

                                    </div>
                                @endforeach

                            </li>

                            <li class="list-group-item lh-sm mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 style="font-size:15px" class="my-1">Harga Ongkir</h6>
                                    <h6 style="font-size:15px" class="my-1">
                                        Rp. {{ number_format($hargaOngkir->ongkir) }}
                                    </h6>
                                </div>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span class="fw-bold">Total</span>
                                @php
                                    $total = 0;
                                    foreach ($hargaItem as $value) {
                                        // Artinya adalah : $value = $value+$item->barang->harga;
                                        $total = $total + $value;
                                    }
                                    // $total = substr()
                                    // $total = $total + $hargaOngkir->ongkir
                                    $total = substr($total + $hargaOngkir->ongkir, 0, -3) . $kodeUnik;

                                @endphp
                                <h5>Rp. {{ number_format($total) }}</h5>
                            </li>

                        </ul>

                    </div>

                    <div class="col-md-7 col-lg-8">

                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="id"
                                placeholder="" value="" name="id" readonly>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="nama" class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="nama" placeholder="" value="safasjkgfijas" name="nama" readonly>
                            <div class="invalid-feedback" role="alert">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" placeholder="" value="08914124" name="no_hp" readonly>
                            <div class="invalid-feedback" role="alert">
                                Valid Nomor is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="sadasd@gmail.com" id="email" placeholder="you@example.com" name="email"
                                readonly>
                            <div class="invalid-feedback" role="alert">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="provinsi" class="form-label">provinsi </label>
                            <input type="text" class="form-control @error('text') is-invalid @enderror"
                                value="{{ $provinsi->name }}" id="email" placeholder="you@example.com"
                                name="provinsi_id" readonly>
                            <div class="invalid-feedback" role="alert">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="kabupaten" class="form-label">Kabupaten </label>
                            <input type="text" class="form-control @error('text') is-invalid @enderror"
                                value="{{ $kabupaten->name }}" id="email" placeholder="you@example.com"
                                name="provinsi_id" readonly>
                            <div class="invalid-feedback" role="alert">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="kecamatan" class="form-label">Kecamatan </label>
                            <input type="text" class="form-control @error('text') is-invalid @enderror"
                                value="{{ $kecamatan->name }}" id="email" placeholder="you@example.com"
                                name="provinsi_id" readonly>
                            <div class="invalid-feedback" role="alert">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="desa" class="form-label">Desa </label>
                            <input type="text" class="form-control @error('text') is-invalid @enderror"
                                value="{{ $desa->name }}" id="email" placeholder="you@example.com"
                                name="provinsi_id" readonly>
                            <div class="invalid-feedback" role="alert">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat Tujuan</label>
                            <textarea name="alamat" value="sadjkbsajfgas" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" cols="7" rows="5" readonly>{{ Auth::user()->alamat }}</textarea>
                            <div class="invalid-feedback" role="alert">
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

                        {{-- <label class="my -6" for="jenis_pembayaran" class="form-label">Metode
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

                        </div> --}}

                        <hr class="mb-3">

                        <button id="pay-button" type="button" target="" onclick="payFunc()"
                            class="w-100 btn btn-success btn-lg mb-5">Bayar Via
                            Midtrans</button>
                        {{-- <button class="w-100  btn-lg" type="submit">Lanjutkan
                            Pembayaran</button> --}}
                    </div>
            </form>



    </div>
    </div>
    </main>


    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-yukSvCI9H4QLH8Hq"></script>


    <script type="text/javascript">
        function payFunc() {
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    // alert("wating your payment!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment failed!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        }

        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }
    </script>
    <!-- <script src="js/checkout/form-validation.js"></script> -->
</body>

</html>
