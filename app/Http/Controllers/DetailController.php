<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{

    public function detail($id)
    {

        // $products = DB::table('tb_barang')->where('id', $id)->get();
        $products = Barang::find($id);
        // $products = Barang::find($id);
        // $products[0]->gambar = unserialize($products[0]->gambar);
        // dd($products->s);
        return view('pages.admin.barang.detailproduk', ['products' => $products]);
    }
}
