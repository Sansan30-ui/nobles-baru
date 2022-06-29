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
        // dd($request);

        // $barang = DB::table('tb_barang')->where('id', $idb)->get();
        // foreach ($request->keranjang_id as $idk) {
        //     // $barang = DB::table('tb_barang')->where('id', $idb)->get();
        //     $keranjang = Keranjang::find($idk);
        //     $barang = Barang::find($keranjang['barang_id']);
        //     $stokAwal = $barang['s'];
        //     $stokAkhir = $keranjang['jumlah'];

        //     $dataUpdate = [
        //         's' =>  $stokAwal - $stokAkhir
        //     ];
        //     $barang->update($dataUpdate);
        // }




        $sumXl = 0;
        $sumL = 0;
        $sumS = 0;
        $sumM = 0;
        if (isset($request->XL) && !isset($request->L) && !isset($request->S) && !isset($request->M)) {
            $request->request->add(['L' => 0, 'S' => 0, 'M' => 0]);
            foreach ($request->XL as $Xl) {
                $sumXl += $Xl;
            }
        } elseif (isset($request->S) && !isset($request->L) && !isset($request->XL) && !isset($request->M)) {
            $request->request->add(['L' => 0, 'XL' => 0, 'M' => 0]);
            foreach ($request->S as $s) {
                $sumS += $s;
            }
        } elseif (isset($request->M) && !isset($request->L) && !isset($request->S) && !isset($request->XL)) {
            $request->request->add(['L' => 0, 'S' => 0, 'XL' => 0]);
            foreach ($request->M as $m) {
                $sumM += $m;
            }
        } elseif (isset($request->L) && !isset($request->XL) && !isset($request->S) && !isset($request->M)) {
            $request->request->add(['XL' => 0, 'S' => 0, 'M' => 0]);

            foreach ($request->L as $l) {
                $sumL += $l;
            }
        } elseif (isset($request->XL) && isset($request->L) && !isset($request->S) && !isset($request->M)) {
            $request->request->add(['S' => 0, 'M' => 0]);
            foreach ($request->XL as $Xl) {
                $sumXl += $Xl;
            }
            foreach ($request->L as $l) {
                $sumL += $l;
            }
        } elseif (isset($request->XL) && isset($request->S) && !isset($request->L) && !isset($request->M)) {
            print_r('xl dan s');
            $request->request->add(['L' => 0, 'M' => 0]);
            foreach ($request->XL as $Xl) {
                $sumXl += $Xl;
            }
            foreach ($request->S as $s) {
                $sumS += $s;
            }
        } elseif (isset($request->XL) && isset($request->M) && isset($request->S) && !isset($request->L)) {
            $request->request->add(['L' => 0]);
            foreach ($request->XL as $Xl) {
                $sumXl += $Xl;
            }
            foreach ($request->M as $m) {
                $sumM += $m;
            }
            foreach ($request->S as $s) {
                $sumS += $s;
            }
        } elseif (isset($request->XL) && isset($request->L) && isset($request->S) && isset($request->M)) {

            foreach ($request->XL as $Xl) {
                $sumXl += $Xl;
            }
            foreach ($request->L as $l) {
                $sumL += $l;
            }
            foreach ($request->M as $m) {
                $sumM += $m;
            }
            foreach ($request->S as $s) {
                $sumS += $s;
            }
        } else {
            print_r('halo');
        }
        // dd($sumS);
        // $products = DB::table('tb_barang')->where('id', $id)->get();
        $products = DB::table('tb_barang')->get();
        $keranjang = Keranjang::with('barang')->where('user_id', Auth::user()->id)->get();
        // dd($keranjang);
        // dd($request);
        // $products = Barang::find($id);
        // $products[0]->gambar = unserialize($products[0]->gambar);
        // dd('da');
        return view('pages.transaction.payment', ['products' => $products, 'keranjang' => $keranjang, 'jumlah_barang' => [
            'XL' => $sumXl,
            'S' => $sumS,
            'M' => $sumM,
            'L' => $sumL,
        ]]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $sumHarga = 0;
        // for ($i = 0; count($request->ids) < 0; $i++) {
        //     # code...
        //     DB::table('transaksi')->insert([
        //         'user_id' => Auth::user()->id,
        //         'barang_id' => $request->ids[$i],
        //         'nama' => $request->nama,
        //         'no_hp' => $request->no_hp,
        //         'email' => $request->email,
        //         'alamat' => $request->alamat,
        //         'total_harga' => $sumHarga += $request->harga[$i],
        //         'jumlah_barang' => $request->l + $request->xl + $request->s + $request->m,
        //         'ukuran' => $request->ukuran[$i],
        //         'status' => $request->status,
        //         'jenis_pembayaran' => $request->jenis_pembayaran,
        //         'created_at' => Carbon::now()

        //     ]);
        // }
        $barangs = Barang::get();
        // dd($barang);
        // $hasilS = 0;
        // $hasilL = 0;
        // $hasilXl = 0;
        // $hasilM = 0;
        // dd($barangs);
        $keranjang = Keranjang::find(auth()->user()->id);
        // dd($keranjang);
        for ($i = 0; count($barangs) > $i; $i++) {
            # code...
            $this->hasilS = $barangs[$i]->s - (int) $request->s;
            $this->hasilL = $barangs[$i]->l - $request->l;
            $this->hasilXl = (int) $barangs[$i]->xl - (int) $request->xl;
            $this->hasilM = $barangs[$i]->m - $request->m;
            echo $barangs[$i]->s - $request->s . "<br>";
            echo $this->hasilS . "<br>";
        }
        // dd($this->hasilS);
        DB::table('tb_barang')->whereIn('id', $request->ids)->update(['s' => $this->hasilS, 'm' => $this->hasilM, 'l' => $this->hasilL, 'xl' => $this->hasilXl]);

        // dd($request->all());
        return redirect('/produk');
    }
}
