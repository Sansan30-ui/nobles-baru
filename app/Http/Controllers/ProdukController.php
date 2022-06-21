<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class ProdukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Barang::latest()->get();
        foreach ($product as $br => $value) {
            $value->gambar = unserialize($value->gambar);
            // dd($value->gambar);
        }
        return view('pages.products.index', ['product' => $product]);
    }
}
