<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function detail($id)
    {
        $products = DB::table('tb_barang')->where('id', $id)->get();

        // dd($products);
        return view('pages.admin.barang.detailproduk', ['products' => $products]);
    }
}
