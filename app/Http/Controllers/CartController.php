<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Keranjang;

class CartController extends Controller
{
    public function index($id)
    {
        // $total_harga = Keranjang::where()
        if ($id == Auth::user()->id) {
            $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            foreach ($keranjang as $array) {
                $newArr[] = $array->barang_id;
            }
            // dd($newArr);
            return view('pages.transaction.cart', ['keranjang' => $keranjang, 'ids' => $newArr]);
        } else {
            return view('pages.transaction.cart');
        }
    }
    public function store(Request $request)
    {
        DB::table('keranjang')->insert([
            'user_id' => Auth::user()->id,
            'barang_id' => $request->id,
            'ukuran' => $request->ukuran,
            'jumlah' => $request->jumlah,
            'created_at' => Carbon::now()

        ]);
        // alihkan halaman tambah buku ke halaman books
        // return redirect ('/upload');
        return redirect('/');
    }
    public function destroy($id)
    {
        $model = Keranjang::find($id);
        $model->delete();
        return redirect('barang');
    }
}
