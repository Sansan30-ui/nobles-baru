<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Keranjang;
use Alert;

class CartController extends Controller
{
    public function index($id)
    {
        // $total_harga = Keranjang::where()
        if ($id == Auth::user()->id) {
            $keranjang = Keranjang::with('barang')->where('user_id', Auth::user()->id)->get();
            // $keranjang_s = Keranjang::with('barang')->where('user_id', Auth::user()->id)->first();
            // dd($keranjang);
            // dd(count($keranjang));
            if (count($keranjang) > 0) {
                foreach ($keranjang as $array) {
                    $newArr[] = $array->barang_id;
                    // dd($array->barang);
                    // $gambar[] = unserialize($array->barang->gambar);
                    // $array->barang->($unserializeGambar);
                    // $tes = DB::table('tb_barang')->where('id', $array->barang_id)->first();
                }
                // dd($gambar);
                // $tes->gambar = unserialize($tes->gambar);
                // dd($keranjang_s->barang->gambar);
                return view('pages.transaction.cart', ['keranjang' => $keranjang,  'ids' => $newArr]);
            } else {
                return view('pages.transaction.cart', ['keranjang' => $keranjang]);
            }
            // dd($newArr);
        } else {
            return view('pages.transaction.cart');
        }
    }
    public function store(Request $request)
    {

        $productCart = Keranjang::where('barang_id', $request->id)->where('ukuran', $request->ukuran)->first();
        // dd(empty($productCart));
        $data = $request->all();
        if (empty($productCart)) {
            DB::table('keranjang')->insert([
                'user_id' => Auth::user()->id,
                'barang_id' => $request->id,
                'ukuran' => $request->ukuran,
                'jumlah' => $request->jumlah,
                // 'kode_pembayaran' => mt_rand(100, 999),
                'created_at' => Carbon::now()

            ]);
            alert()->success('Barang berhasil dimasukan kedalam keranjang', 'Sukses');
            return redirect()->back();
        } else {
            $data['jumlah'] = $productCart->jumlah + $data['jumlah'];
            $productCart->update($data);
            alert()->success('Barang berhasil dimasukan kedalam keranjang', 'Sukses');
            return redirect()->back();
        }
        // alihkan halaman tambah buku ke halaman books
        // return redirect ('/upload');
    }
    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        alert()->success('Barang berhasil dihapus', '');
        return redirect()->back();
    }
}
