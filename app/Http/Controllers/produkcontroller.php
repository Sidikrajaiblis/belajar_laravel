<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produks;
use App\Models\kategoris;

class produkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produks::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategoris::all();
        return view('produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new produks();
        $produk->nama_produk    = $request->nama_produk;
        $produk->harga          = $request->harga;
        $produk->stok           = $request->stok;
        $produk->kategori_id    = $request->kategori_id;
        $produk->save();

        session()->flash('success', 'Data berhasil ditambahkan');

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produks::find($id);
        $kategori = Kategoris::all();
        return view('produk.show', compact('produk', 'kategori'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produks::findOrFail($id);
        $kategori = kategoris::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = produks::findOrFail($id);
        $produk->nama_produk    = $request->nama_produk;
        $produk->harga          = $request->harga;
        $produk->stok           = $request->stok;
        $produk->kategori_id    = $request->kategori_id;
        $produk->save();

        session()->flash('success', 'Data berhasil diubah');

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        produks::findOrFail($id)->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('produk.index');
    }
}
