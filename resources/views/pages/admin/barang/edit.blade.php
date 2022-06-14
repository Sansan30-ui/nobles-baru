@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <form method="POST" action="{{ url('barang/' . $model->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PATCH">

            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama" value="{{ $model->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga" value="{{ $model->harga }}">
                        </div>

                        <div class="form-group">
                            <label>Stok </label>
                            <input type="text" class="form-control" name="stok" value="{{ $model->stok }}">
                        </div>
                        <div class="form-group">
                            <label>Ukuran</label>
                            <input input type="text" class="form-control" name="ukuran" value="{{ $model->ukuran }}">
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <input input type="text" class="form-control" name="jenis" value="{{ $model->jenis }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input input type="text" class="form-control" name="deskripsi"
                                value="{{ $model->deskripsi }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
    </div><!-- /.container-fluid -->


    </form>
    </div>
@endsection
