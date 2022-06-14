@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <form method="POST" action="{{ url('barang') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">

                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan nama barang">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Masukan Harga Barang">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="s" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="m" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="l" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="xl" placeholder="Masukan Stok Barang">
                    </div>

                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" class="form-control" name="jenis" placeholder="Masukan Jenis barang">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi barang">
                    </div>
                    {{-- <div class="form-group"> --}}
                    {{-- <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose
                                    file</label>
                            </div> --}}
                    <div class="mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">
                            <label for="gambar" class="form-label">Input Gambar</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                    </div>
                    {{-- </div> --}}
                    {{-- </div> --}}
                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <!-- /.col -->

        </form>
    </div>
@endsection
