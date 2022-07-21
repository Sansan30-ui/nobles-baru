@extends('layouts.admin')

@section('content')
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }
    </style>
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
                        <label>S</label>
                        <input type="text" class="form-control" name="s" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label>M</label>
                        <input type="text" class="form-control" name="m" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label>L</label>
                        <input type="text" class="form-control" name="l" placeholder="Masukan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label>XL</label>
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
                    <div class="mb-3">
                        <label for="gambar">Gambar</label>
                        <div class="input-group hdtuto control-group lst increment mb-2">
                            <input type="file" name="gambar[]" class="myfrm form-control">
                        </div>
                        <div class="input-group hdtuto control-group lst increment mb-2">
                            <input type="file" name="gambar[]" class="myfrm form-control">
                        </div>
                        <div class="input-group hdtuto control-group lst increment mb-2">
                            <input type="file" name="gambar[]" class="myfrm form-control">
                        </div>
                        @error('gambar')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mt-1 text-center">
                            <div class="gambar-preview-div"> </div>
                        </div>
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
    <script type="text/javascript">
        $(function() {
            // Multiple gambar preview with JavaScript
            var previewgambar = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#gambar').on('change', function() {
                previewgambar(this, 'div.gambar-preview-div');
            });
        });
    </script>
@endsection
