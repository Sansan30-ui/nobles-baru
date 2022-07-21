<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HargaOngkir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\Keranjang;
use App\models\Payment;
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
        $provinsi = \Indonesia::findProvince(Auth::user()->provinsi_id, $with = null);
        $kabupaten = \Indonesia::findCity(Auth::user()->kabupaten_id, $with = null);
        $kecamatan = \Indonesia::findDistrict(Auth::user()->kecamatan_id, $with = null);
        $desa = \Indonesia::findVillage(Auth::user()->desa_id, $with = null);
        $hargaOngkir = HargaOngkir::where('provinces_id', Auth::user()->provinsi_id)->first();
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
        $kodeUnik = mt_rand(100, 999);
        $total = substr($total + $hargaOngkir->ongkir, 0, -3) . $kodeUnik;
        // dd($total);

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
            'item_details' => array(
                [
                    'id' => 'A1',
                    'price' => '50000',
                    'quantity' => $keranjang->jumlah,
                    'name' => 'baju,'
                ],
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                "email" => Auth::user()->email,
                'phone' => Auth::user()->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.transaction.payment', ['hargaOngkir' => $hargaOngkir, 'provinsi' => $provinsi, 'kabupaten' => $kabupaten, 'kecamatan' => $kecamatan, 'desa' => $desa, 'products' => $products, 'keranjang' => $keranjang, 'snap_token' => $snapToken, 'kodeUnik' => $kodeUnik]);
    }

    // midtrans
    public function payment_post(Request $request)
    {

        $json = json_decode($request->get('json'));
        // dd($request);
        $payment = new Payment();
        $payment->status = $json->transaction_status;
        $payment->nama = Auth::user()->name;
        $payment->email = Auth::user()->email;
        $payment->no_hp = Auth::user()->no_hp;
        $payment->order_id = $json->order_id;
        $payment->gross_amount = $json->gross_amount;
        $payment->payment_type = $json->payment_type;
        $payment->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $payment->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        for ($i = 0; $i <= count($request->ids) - 1; $i++) {
            DB::table('transaksi')->insert([
                'user_id' => Auth::user()->id,
                'barang_id' => $request->ids[$i],
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'total_harga' => $request->harga[$i] * $request->jumlah[$i],
                'status' => $request->status,
                'kode_pembayaran' => $request->kode_pembayaran,
                'created_at' => Carbon::now(),
            ]);
        }

        DB::table('keranjang')->whereIn('barang_id', $request->ids)->delete();

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

        return $payment->save() ? redirect(url('/'))->with('status', 'Checkout Berhasil') : redirect(url('/'))->with('error', 'Checkout Gagal');
    }

    public function store(Request $request)
    {
        // subtr()

        $sumHarga = 0;
        // dd($request);

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
