<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payment($id)
    {


        $products = DB::table('tb_barang')->where('id', $id)->get();
        // $products = Barang::find($id);
        $products[0]->gambar = unserialize($products[0]->gambar);
        // dd('da');
        return view('pages.transaction.payment', ['products' => $products]);
    }
}
