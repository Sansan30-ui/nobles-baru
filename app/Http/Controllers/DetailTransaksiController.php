<?php

namespace App\Http\Controllers;

use App\Models\HargaOngkir;
use App\Models\Transaksi;
use App\models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailTransaksiController extends Controller
{
    public function detail($kode)
    {
        $trans = Transaksi::where('kode_pembayaran', $kode)
            ->get();
        $total =  Transaksi::where('kode_pembayaran', $kode)
            ->sum('total_harga');
        $hargaOngkir = (auth()->user()->role == 'user') ? HargaOngkir::where('provinces_id', Auth::user()->provinsi_id)->first() : HargaOngkir::where('provinces_id', 2)->first();
        $kodeUnik = mt_rand(100, 999);

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
                'gross_amount' =>  $total + $hargaOngkir->ongkir + $kode,
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
                'phone' => Auth::user()->no_hp,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($hargaOngkir->ongkir);
        $data = [
            'trans' => $trans,
            'hargaOngkir' => $hargaOngkir->ongkir,
            'total' => $total,
            'totalAll' => $total + $hargaOngkir->ongkir + $kode,
            'kd_unik' => $kode,
            'snap_token' => $snapToken,
        ];


        return view('pages.transaction.detailtransaksi', $data);
    }

    public function payment_post(Request $request)
    {
        $json = json_decode($request->get('json'));
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

        // Transaksi::where('kode_pembayaran')->get();
        $data =  DB::table('transaksi')->where('kode_pembayaran', $request->kode_pembayaran)->update([
            'status' => 'sudah dibayar',
            'created_at' => Carbon::now(),
        ]);

        return $payment->save() ? redirect(url('/'))->with('status', 'Checkout Berhasil') : redirect(url('/'))->with('error', 'Checkout Gagal');
        // return $request;


    }
}
