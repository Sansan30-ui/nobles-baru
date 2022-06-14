<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();

        return view('pages.admin.barang.index', compact(
            'barangs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Barang;
        return view('pages.admin.barang.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Barang;
        $model->nama = $request->nama;
        $model->harga = $request->harga;
        $model->s = $request->s;
        $model->m = $request->m;
        $model->l = $request->l;
        $model->xl = $request->xl;
        $model->jenis = $request->jenis;
        $model->deskripsi = $request->deskripsi;
        $model->gambar = $request->file('gambar');

        $gambar = $model->gambar->move(base_path() . '/public/images', time() . $model->gambar->getClientOriginalName());
        $model->gambar = $gambar->getFilename();



        $model->save();

        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Barang::find($id);
        return view('pages.admin.barang.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { {
            $model = Barang::find($id);
            $model->nama = $request->nama;
            $model->harga = $request->harga;
            $model->s = $request->s;
            $model->m = $request->m;
            $model->l = $request->l;
            $model->xl = $request->xl;
            $model->jenis = $request->jenis;
            $model->deskripsi = $request->deskripsi;
            $model->save();

            return redirect('barang');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Barang::find($id);
        $model->delete();
        return redirect('barang');
    }
}
