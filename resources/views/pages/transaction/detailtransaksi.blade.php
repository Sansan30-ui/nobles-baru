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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <title>Detail Transaksi</title>
</head>

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

<body>
    <form class="needs-validation" id="submit_form" novalidate action="/payment" method="POST"
        enctype="multipart/form-data">
        @csrf
        <section class="h-100 h-custom" style="background-color: #d2c9ff;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Detail Transaksi</h1>

                                            </div>
                                            <hr class="my-4">

                                            @foreach ($trans as $t)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">{{ $t->barang->nama }}</h6>
                                                        <h6 class="text-black mb-0">{{ $t->barang->jenis }}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                                        <h4>

                                                            Rp.{{ number_format($t->total_harga) }}
                                                        </h4>

                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="p-5">
                                            @if (auth()->user()->role == 'user')
                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Kode Unik</h5>
                                                    <h5>Rp. {{ $kd_unik }}</h5>
                                                </div>

                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Harga Ongkir</h5>
                                                    @if (auth()->user()->role == 'admin')
                                                    @else
                                                        <h5>Rp. {{ number_format($hargaOngkir) }}</h5>
                                                    @endif

                                                </div>
                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">Total price</h5>
                                                    <h5>Rp. {{ number_format($totalAll) }}</h5>
                                                </div>
                                                <input type="hidden" name="kode_pembayaran"
                                                    value="{{ $kd_unik }}">
                                                <input type="hidden" name="json" id="json_callback">
                                                <button id="pay-button" type="button" target=""
                                                    onclick="payFunc()" class="w-20 btn btn-success btn-lg mt-5">Bayar
                                                    Sekarang</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
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
</body>

</html>
