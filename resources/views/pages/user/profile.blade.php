@extends('layouts.user')
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">

            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>Password Sekarang</label>
                                    <input class="form-control" type="text" name="password"
                                        placeholder="Masukan Password Sekarang" value="password">
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input class="form-control" type="text" name="password"
                                        placeholder="Masukan Password Baru" value="password">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input class="form-control" type="text" name="password"
                                        placeholder="Konfirmasi Password" value="password">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" novalidate="">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Nama Lengkap</label>
                                                                    <input class="form-control" type="text"
                                                                        name="nama" placeholder="New Username"
                                                                        value="{{ $user[0]->name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="user@example.com"
                                                                        value="{{ $user[0]->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col d-flex justify-content-between">
                                                        <button class="btn btn-primary" type="submit">Save
                                                            Changes</button>
                                                        <button id="ubah-password" class="btn btn-primary"
                                                            data-toggle="modal">
                                                            Ubah Password</button>
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
@endsection
