@extends('layouts.user')
@section('content')
    <div class="container">

        <table class="table-bordered table mt-5">
            <tr>
                <th>Kode Pembayaran</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Resi Pengiriman</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_pembayaran }}</td>
                    <td> {{ $item->total }}
                    </td>
                    <td>
                        <form action="">
                            {{-- @foreach ($item as $deepItem)
                            @endforeach --}}
                            {{-- <input type="hidden" name="transaksi_ids[]" value="{{ $deepItem }}"> --}}
                            <button id="pay-button" type="button" target="" onclick="payFunc()"
                                class="w-20 btn btn-success btn-lg mt-5">Bayar Via
                                Midtrans</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
{{-- @push('custom-script')
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
@endpush --}}
