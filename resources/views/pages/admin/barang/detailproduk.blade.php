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
    <link rel="stylesheet" href="{{ asset('css') }}/checkout/qty.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .w-100 {
            width: 100% !important;
            max-height: 500px;
        }

        .card {
            margin-top: 100px;
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

        #add-cart:hover {
            background-color: white;
            border: 1px solid #002C3E;
            color: #002C3E;
        }

        #add-cart {
            background-color: #002C3E;
            color: white;
        }


        #size {
            background-color: white;
            border: 1px #002C3E dashed;
            color: #002C3E;
        }

        #size:hover {
            cursor: unset;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <!-- Modal -->
    @foreach ($products as $item)
        <form class="needs-validation" novalidate action="/keranjang" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 form-group" id="ukuran">
                                    <label for="ukuran">Ukuran</label>
                                    <select name="ukuran" class="form-control" selected id="ukuran">
                                        <option selected>--- Pilih Ukuran ---</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                                <div class="col-6 form-group" id="jumlah">
                                    <label for="">Jumlah</label>
                                    <select name="jumlah" id="jumlah" class="form-control">
                                        <option selected>--- Pilih Jumlah ---</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="id" value="{{ $item->id }}"
                                    name="id" required>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" style="object-fit: cover"
                                        src="{{ asset('images/' . $item->gambar[0]) }}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="object-fit: cover"
                                        src="{{ asset('images/' . $item->gambar[1]) }}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="object-fit: cover"
                                        src="{{ asset('images/' . $item->gambar[2]) }}" alt="Third slide">
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
                            <h2 class="title-produk"
                                style="text-transform: capitalize; font-weight: bold; color:#002C3E">
                                {{ $item->nama }}</h2>
                        </div>
                        <div class="content">
                            <div style="display: flex">
                                <p style="text-transform: capitalize; color: #aaaaaa; font-size: 14px" class="mr-2">
                                    Kategori : </p>
                                <p style="font-weight: bold; color: #002C3E; font-size: 14px">
                                    {{ $item->jenis }}</p>
                            </div>
                            <h2 style="font-weight: bold">
                                {{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}
                            </h2>

                            @php
                                $total_stok = $item->s + $item->m + $item->l + $item->xl;
                            @endphp
                            <h6 style="font-weight: bold">Size :</h6>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <button id="size">
                                        S : {{ $item->s }}
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button id="size">
                                        M : {{ $item->m }}
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button id="size">
                                        L : {{ $item->l }}
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button id="size">
                                        XL : {{ $item->xl }}
                                    </button>
                                </div>
                            </div>
                            <h6>Deskripsi: <span class="deskripsi">{{ $item->deskripsi }}</span></h6>
                        </div>
                        <div class="btn-produk">
                            {{-- <a href="{{ url('payment/' . $item->id) }}"><button class="btn btn-produk">Beli
                                    Sekarang</button></a> --}}
                            <button id="add-cart" class="btn btn-produk" data-toggle="modal"
                                data-target="#modalProduk"><i class="fas fa-cart-plus mr-2"></i>Add to
                                Cart</button>
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
    <script>
        $(document).ready(function() {
            $('.count').prop('disabled', true);
            $(document).on('click', '.plus', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.minus', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>
</body>

</html>
