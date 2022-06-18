@extends('layouts.admin')
@section('content')
    <br />
    <a class="btn btn-info" href="{{ url('barang/create') }}">Tambah Barang</a>
    <div class="container-fluid mt-2">

        <table class="table-bordered table">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th colspan="2">AKSI</th>
            </tr>
            @foreach ($barangs as $key => $value)
                <tr>
                    <td>{{ $value->nama }}</td>
                    <td>Rp. {{ number_format($value->harga) }}</td>
                    <td> {{ $total_stok = $value->s + $value->m + $value->l + $value->xl }}</td>
                    <td>{{ $value->jenis }}</td>
                    <td>{{ $value->deskripsi }}</td>
                    <td><img src="{{ url('/images', $value->gambar) }}" width="80px" alt="Gambar Produk"></td>
                    <td><a class="btn btn-info" href="{{ url('barang/' . $value->id . '/edit') }}">EDIT</a></td>
                    <td>
                        <form action="{{ url('barang/' . $value->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit">DELETE</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
