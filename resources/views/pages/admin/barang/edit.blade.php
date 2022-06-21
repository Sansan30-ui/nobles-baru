@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-3">
        <form method="POST" action="{{ url('barang/' . $model->id) }}" enctype="multipart/form-data">
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
                            <label>S </label>
                            <input type="text" class="form-control" name="s" value="{{ $model->s }}">
                        </div>
                        <div class="form-group">
                            <label>M </label>
                            <input type="text" class="form-control" name="m" value="{{ $model->m }}">
                        </div>
                        <div class="form-group">
                            <label>L </label>
                            <input type="text" class="form-control" name="l" value="{{ $model->l }}">
                        </div>
                        <div class="form-group">
                            <label>XL </label>
                            <input type="text" class="form-control" name="xl" value="{{ $model->xl }}">
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
                        {{-- <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">

                                </div>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label for="gambar">Gambar</label>
                            @foreach ($model->gambar as $gbr)
                                {{-- @dump($gbr . ','); --}}
                                <div class="input-group hdtuto control-group lst increment mb-2">
                                    <input type="file" name="gambar[]" class="myfrm form-control" value="">
                                    <input type="hidden" name="gambarLama[]" class="myfrm form-control"
                                        value="{{ $gbr }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"><i
                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>
                                <img src="{{ url('/images', $gbr) }}" width="50px" alt="Gambar Produk">
                            @endforeach
                            {{-- <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">
                                <label for="gambar" class="form-label">Input Gambar</label>
                                @if ($model->gambar)
                                    <img src="{{ asset('/public/images' . $model->gambar) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif

                                <input class="form-control" type="file" id="gambar" name="gambar"
                                    onchange="previewImage()">
                            </div> --}}
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

    <script>
        function previewImage() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
