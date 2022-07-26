@extends('layouts.user')
@section('content')
    <div class="container">

        <table class="table-bordered table mt-5">
            <tr>
                <th>Kode Pembayaran</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Detail Transaksi</th>
                <th>Resi Pengiriman</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->kode_pembayaran }}</td>

                    <td> {{ $item->total }}</td>

                    <td>
                        @if ($item->status == 'belum dibayar')
                            <a href="/detail/transaksi/{{ $item->kode_pembayaran }}"
                                class="w-20 btn btn-success btn-lg mt-5">Lanjutkan
                                Pembayaran</a>
                        @elseif ($item->status == 'sudah dibayar')
                            <label for="">Pesanan Diproses</label>
                        @elseif ($item->status == 'pesanan dikirim')
                            <label for="">Pesanan Sedang Dikirim</label>
                        @endif

                    </td>
                    <td>
                        <a href="/detail/transaksi/{{ $item->kode_pembayaran }}"
                            class="w-20 btn btn-success btn-lg mt-5">Lanjutkan
                            Pembayaran</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
