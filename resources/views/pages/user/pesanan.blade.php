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
