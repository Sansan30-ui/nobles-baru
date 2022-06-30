<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Keranjang;
use App\models\Keranjang;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Stmt\Foreach_;

class TransaksiController extends Controller
{
    private $hasilS;
    private $hasilXl;
    private $hasilL;
    private $hasilM;

    public function payment(Request $request)
    {
        for ($i = 0; $i <= count($request->barang_id) - 1; $i++) {
            $data = $request->barang_id[$i];
            // dd($data['S']);
        }

        $products = DB::table('tb_barang')->get();
        $keranjang = Keranjang::with('barang')->where('user_id', Auth::user()->id)->get();

        return view('pages.transaction.payment', ['products' => $products, 'keranjang' => $keranjang]);
    }
    public function store(Request $request)
    {
        // dd($request);

        $sumHarga = 0;
        for ($i = 0; $i <= count($request->ids) - 1; $i++) {
            DB::table('transaksi')->insert([
                'user_id' => Auth::user()->id,
                'barang_id' => $request->ids[$i],
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'total_harga' => $sumHarga += $request->harga[$i],
                // 'jumlah_barang' => $request->l + $request->xl + $request->s + $request->m,
                // 'ukuran' => $request->ukuran[$i],
                'jumlah_barang' => 0,
                'ukuran' => 0,
                'status' => $request->status,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'created_at' => Carbon::now(),
            ]);
        }
        // dd($cek);
        for ($i = 0; $i <= count($request->ukuran) - 1; $i++) {
            $data = $request->ukuran[$i];

            $barangs = Barang::where('id', $request->ids[$i])->first();
            if (isset($data['S'])) {
                $stokAkhir = $barangs->s - $data["S"];
                DB::table('tb_barang')->where('id', $request->ids[$i])->update(['s' => $stokAkhir]);
            } elseif (isset($data['M'])) {
                $stokAkhir = $barangs->m - $data["M"];
                DB::table('tb_barang')->where('id', $request->ids[$i])->update(['m' => $stokAkhir]);
            } elseif (isset($data['L'])) {
                $stokAkhir = $barangs->l - $data["L"];
                DB::table('tb_barang')->where('id', $request->ids[$i])->update(['l' => $stokAkhir]);
            } elseif (isset($data['XL'])) {
                $stokAkhir = $barangs->xl - $data["XL"];
                DB::table('tb_barang')->where('id', $request->ids[$i])->update(['xl' => $stokAkhir]);
            } else {
                return redirect()->back()->withErrors('Oops Ada yang salah');
            }
        }

        return redirect('/produk');
    }
}
