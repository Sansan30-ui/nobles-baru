<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $search = Barang::latest();
        if (request('search')) {
            $search->where('nama', 'like', '%' . request('search') . '%');
        }
        // dd(request('search'));
        $products = Barang::latest()->get();
        // dd($products);
        return view('pages.index', ['products' => $products]);
    }

    // public function search()
    // {
    //     //menangkap data pencarian
    //     $search = $request->search;
    //     //mengambil data dari table upload
    //     $produk = DB::table('tb_barang')
    //         ->where('nama', 'like', "%" . request('search') . "%")
    //         ->orWhere('harga', 'like', "%" . request('search') . "%")
    //         ->paginate(6);

    //     return view('pages.index', ['produk' => $produk]);
    // }
}
