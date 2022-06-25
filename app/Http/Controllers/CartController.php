<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Keranjang;

class CartController extends Controller
{
    public function index($id)
    {
        // $total_harga = Keranjang::where()
        if ($id == Auth::user()->id) {
            $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            return view('pages.transaction.cart', ['keranjang' => $keranjang]);
        } else {
            return view('pages.transaction.cart');
        }
    }
    public function store(Request $request)
    {

        // $id_produk = DB::table('produk')->select('id')->where('produk', '=', $request->produk)->get();
        // $stock = DB::table('produk')->select('produk.stock')->where('id', $id_produk[0]->id)->first();
        // $stock->stock -= 1;
        // $stock = DB::table('produk')->where('id', $id_produk[0]->id)->update(['stock' => $stock->stock]);
        // DB::table('upload') -> update([
        DB::table('keranjang')->insert([
            'user_id' => Auth::user()->id,
            'barang_id' => $request->id,
            'ukuran' => $request->ukuran,
            'jumlah' => $request->jumlah,
            'created_at' => Carbon::now()

        ]);
        // alihkan halaman tambah buku ke halaman books
        // return redirect ('/upload');
        return redirect('/');
    }
}
