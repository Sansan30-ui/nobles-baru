@extends('layouts.user')
@section('content')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">

            </div>

            <!-- Modal -->


            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" action="{{ url('/akun') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input class="form-control" type="text"
                                                                        name="name" placeholder="New Username"
                                                                        value="{{ Auth::user()->name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="text"
                                                                        name="email" placeholder="user@example.com"
                                                                        value="{{ Auth::user()->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Nomor HP</label>
                                                                    <input class="form-control" type="text"
                                                                        name="no_hp" placeholder="+62"
                                                                        value="{{ Auth::user()->no_hp }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label"
                                                                for="provinsi">Provinsi</label>
                                                            <div class="col-md-9">
                                                                @php
                                                                    $provinces = new App\Http\Controllers\DependentDropdownController();
                                                                    $provinces = $provinces->provinces();
                                                                @endphp
                                                                <select class="form-control" name="provinsi_id"
                                                                    id="provinsi" required>
                                                                    <option>==Pilih Salah Satu==</option>
                                                                    @foreach ($provinces as $item)
                                                                        <option value="{{ $item->id ?? '' }}">
                                                                            {{ $item->name ?? '' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label" for="kota">Kabupaten
                                                                / Kota</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="kabupaten_id"
                                                                    id="kota" required>
                                                                    <option>==Pilih Salah Satu==</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label"
                                                                for="kecamatan">Kecamatan</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="kecamatan_id"
                                                                    id="kecamatan" required>
                                                                    <option>==Pilih Salah Satu==</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label class="col-md-3 col-form-label"
                                                                for="desa">Desa</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="desa_id" id="desa"
                                                                    required>
                                                                    <option>==Pilih Salah Satu==</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Alamat Lengkap</label>
                                                                    <input class="form-control" type="text"
                                                                        name="alamat" placeholder="jln...."
                                                                        value="{{ Auth::user()->alamat }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col d-flex justify-content-between">
                                                        <button class="btn btn-primary" type="submit">Simpan
                                                            Perubahan</button>
                                                        <button id="ubahPassword" type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#ubah-password">
                                                            Ubah Password</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form action="{{ url('/password') }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal fade" id="ubah-password" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah
                                                                    Password
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="">
                                                                    <div class="form-group" id="password">
                                                                        <label>Password Sekarang</label>
                                                                        <input class="form-control" type="password"
                                                                            name="password_lama"
                                                                            placeholder="Masukan Password Sekarang">
                                                                    </div>
                                                                    <div class="form-group" id="passwordbaru">
                                                                        <label>Password Baru</label>
                                                                        <input class="form-control" type="password"
                                                                            name="password"
                                                                            placeholder="Masukan Password Baru">
                                                                    </div>
                                                                    <div class="form-group" id="konfirpassword">
                                                                        <label>Konfirmasi Password</label>
                                                                        <input class="form-control" type="password"
                                                                            name="konfirmasi_password"
                                                                            placeholder="Konfirmasi Password">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Perubahan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#provinsi').on('change', function() {
                onChangeSelect('{{ route('cities') }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function() {
                onChangeSelect('{{ route('districts') }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
            })
        });
    </script>
@endsection
