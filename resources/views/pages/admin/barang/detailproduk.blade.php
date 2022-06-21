<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
    <style>
        .w-100 {
            width: 100% !important;
            max-height: 500px;
        }

        .card {
            margin-top: 80px;
        }

        button.btn.btn-produk {
            text-decoration: none;
            background: #8a25c2;
            color: #fff;
        }

        h3.title-produk {
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        h4 {
            font-weight: 800;
            font-size: 17px;
            margin-bottom: 20px;
        }

        span {
            font-size: 16px;
            color: #080808;
            font-weight: 400;
        }
    </style>
</head>

<body class="hold-transition login-page">
    @foreach ($products as $item)
    @endforeach
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('images/' . $item->gambar[0]) }}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('images/' . $item->gambar[1]) }}"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('images/' . $item->gambar[2]) }}"
                                        alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="title-div">
                            <h3 class="title-produk">{{ $item->nama }}</h3>
                        </div>
                        <div class="content">
                            <h4>KATEGORI: <span>{{ $item->jenis }}</span></h4>
                            <h4>HARGA: <span>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</span></h4>

                            @php
                                $total_stok = $item->s + $item->m + $item->l + $item->xl;
                            @endphp
                            <h4>STOK:<span> {{ $total_stok }}</span></h4>
                            <h4>SIZE:
                                <br>
                                <span class="size" data-toggle="tooltip" title="small">S =
                                    {{ $item->s }}</span>
                                <br>
                                <span class="size" data-toggle="tooltip" title="medium">M =
                                    {{ $item->m }} </span>
                                <br>
                                <span class="size" data-toggle="tooltip" title="large">L =
                                    {{ $item->l }}</span>
                                <br>
                                <span class="size" data-toggle="tooltip" title="xtra large">XL =
                                    {{ $item->xl }}</span>
                            </h4>
                            <h4>DESKRIPSI: <span class="deskripsi">{{ $item->deskripsi }}</span></h4>
                        </div>
                        <div class="btn-produk">
                            <button class="btn btn-produk">Beli Sekarang</button>
                            <button class="btn btn-produk"><i class="fas fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>
    <script>
        $('.carousel').carousel()
    </script>
</body>

</html>
