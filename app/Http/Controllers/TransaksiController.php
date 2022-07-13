<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        for ($i = 0; $i <= count($request->barang_id) - 1; $i++) {
            $data = $request->barang_id[$i];
        }

        $products = DB::table('tb_barang')->get();
        $keranjang = Keranjang::with('barang')->where('user_id', Auth::user()->id)->get();
        foreach ($keranjang as $key => $p) {
            # code...
            $hargaItem[] = $p->barang->harga * $p->jumlah;
        }

        $total = 0;
        foreach ($hargaItem as $value) {
            // Artinya adalah : $value = $value+$item->barang->harga;
            $total = $total + $value;
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-5i8i4_LfjFg0-TAnjSnHusa_';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            // 'item_details' => array(
            //     [
            //         'id' => 'A1',
            //         'price' => '50000',
            //         'quantity' => $keranjang->jumlah,
            //         'name' => 'baju,'
            //     ],
            // ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                "email" => Auth::user()->email,
                'phone' => '098123',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.transaction.payment', ['products' => $products, 'keranjang' => $keranjang, 'snap_token' => $snapToken]);
    }
    public function store(Request $request)
    {

        $sumHarga = 0;
        // dd($request);
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
                // 'jumlah_barang' => 0,
                // 'ukuran' => 0,
                'status' => $request->status,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'created_at' => Carbon::now(),
            ]);
            DB::table('keranjang')->whereIn('barang_id', $request->ids)->delete();
        }
        // dd($request->ukuran);
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
