@extends('layouts.admin')
@section('content')
    <br>


    <table class="table-bordered table">

        <tr>
            <th>Nama Pembeli</th>
            {{-- <th>Provinsi</th>
            <th>Kabupaten</th>
            {{-- <th>Kecamatan</th> --}}
            <th>Desa</th>
            <th>Alamat Lengkap</th>
            <th>Total Harga</th>
            <th>Kode Pembayaran</th>
            <th>Detail Barang</th>
            <th>Status</th>
            <th>Input Resi</th>

        </tr>
        @foreach ($data as $p)
            <tr>
                <form action="/status/{{ $p->kode_pembayaran }}" method="POST">
                    @csrf
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>100000</td>
                    <td>{{ $p->kode_pembayaran }}</td>
                    <td> </td>
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
                        <td>
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">Masukan Resi</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    @else
                        <td>...</td>
                    @endif
                </form>
            </tr>
        @endforeach
    @endsection
