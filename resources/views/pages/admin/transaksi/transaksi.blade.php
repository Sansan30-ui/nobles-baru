@extends('layouts.admin')
@section('content')
    <br>


    <table class="table-bordered table">

        <tr>
            <th>Nama Pembeli</th>
            {{-- <th>Provinsi</th>
            <th>Kabupaten</th>
            <th>Kecamatan</th>
            <th>Desa</th> --}}
            <th>Alamat Lengkap</th>
            <th>Total Harga</th>
            <th>Kode Pembayaran</th>
            <th>Status</th>
            <th>Input Resi</th>

        </tr>
        @foreach ($data as $p)
            <tr>
                <form action="/status/{{ $p->kode_pembayaran }}" method="POST">
                    @csrf
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td></td>
                    <td>{{ $p->kode_pembayaran }}</td>
                    <td>
                        @if ($p->status == 'belum dibayar')
                            <button class="btn btn-danger">{{ $p->status }}</button>
                        @elseif ($p->status == 'sudah dibayar')
                            <button class="btn btn-success">{{ $p->status }}</button>
                        @else
                            <button class="btn btn-primary">{{ $p->status }}</button>
                        @endif
                    </td>
                    @if ($p->status == 'sudah dibayar')
                        <td><button type="submit" class="btn btn-primary">Masukan Resi</button></td>
                    @else
                        <td>...</td>
                    @endif
                </form>
            </tr>
        @endforeach
    @endsection
