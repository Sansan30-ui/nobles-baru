@extends('layouts.admin')
@section('content')
    <br>
    <table class="table-bordered table">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="2">AKSI</th>
        </tr>
        @foreach ($user as $u)
            <tr>
                <td>{{ $u->name }} </td>
                <td>{{ $u->email }} </td>
                <td>{{ $u->role }} </td>
                <td>
                    <form action="{{ url('/akun/' . $u->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $u->id }}">
                        <button class="btn btn-danger" type="submit">DELETE</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
