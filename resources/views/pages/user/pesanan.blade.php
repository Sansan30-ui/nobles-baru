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
                            {{-- <a href="/detail/transaksi/{{ $item->kode_pembayaran }}"
                                class="w-20 btn btn-success btn-lg mt-5">Lanjutkan
                                Pembayaran</a> --}}
                            <button class="btn btn-danger">{{ $item->status }}</button>
                            {{-- <label for="">Pesanan Belum Dibayar</label> --}}
                        @elseif ($item->status == 'sudah dibayar')
                            <button class="btn btn-success">{{ $item->status }}</button>
                            {{-- <label for="">Pesanan Diproses</label> --}}
                        @elseif ($item->status == 'pesanan dikirim')
                            <button class="btn btn-primary">{{ $item->status }}</button>
                            {{-- <label for="">Pesanan Sedang Dikirim</label> --}}
                        @endif

                    </td>
                    <td>
                        @if ($item->status == 'belum dibayar')
                            <a href="/detail/transaksi/{{ $item->kode_pembayaran }}"
                                class="w-20 btn btn-success btn-lg mt-5">Lanjutkan
                                Pembayaran</a>
                        @else
                            <a href="/detail/transaksi/{{ $item->kode_pembayaran }}"
                                class="w-20 btn btn-secondary btn-lg mt-5">Detail Pesanan</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
