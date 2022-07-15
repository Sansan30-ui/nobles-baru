<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

class PesananController extends Controller
{
    public function index()
    {
        // $data = Transaksi::where('user_id', auth()->user()->id)->get()->groupBy('kode_pembayaran');
        // $total = Transaksi::groupBy('kode_pembayaran')->selectRaw('sum(total_harga) as total, kode_pembayaran')->pluck('total', 'kode_pembayaran');
        $data = Transaksi::groupBy('kode_pembayaran')->selectRaw('*, sum(total_harga) as total')->get();
        // dd($data1);
        // foreach ($data as $key => $value) {
        //     # code...
        // }
        return view('pages.user.pesanan', [
            'data' => $data,
            // 'total' => $total
        ]);
    }
}
