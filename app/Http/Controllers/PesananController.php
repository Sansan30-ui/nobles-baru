<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\Barang;

class PesananController extends Controller
{
    public function index()
    {
        // $data = Transaksi::where('user_id', auth()->user()->id)->get()->groupBy('kode_pembayaran');
        // $total = Transaksi::groupBy('kode_pembayaran')->selectRaw('sum(total_harga) as total, kode_pembayaran')->pluck('total', 'kode_pembayaran');
        // $data = Transaksi::groupBy('kode_pembayaran')->selectRaw('*, sum(total_harga) as total')->get();
        $data = Transaksi::where('user_id', auth()->user()->id)->groupBy('kode_pembayaran')->selectRaw('*, sum(total_harga) as total')->get();
        $datas = Transaksi::where('user_id', auth()->user()->id)->get();
        // dd($data1);
        // foreach ($data as $key => $value) {
        //     # code...
        // }
        // dd($data);
        return view('pages.user.pesanan', [
            'data' => $data,
            'datas' => $datas
            // 'barang' => $barang,
            // 'total' => $total
        ]);
    }
}
