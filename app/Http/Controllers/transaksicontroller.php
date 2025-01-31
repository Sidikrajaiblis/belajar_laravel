<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksis;
use App\Models\bukus;
use App\Models\pembelis;

class transaksicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksis::all();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = transaksis::all();
        $buku = bukus::all();
        $pembeli = pembelis::all();
        return view('transaksi.create' , compact('transaksi' , 'buku' , 'pembeli'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required',
            'id_buku' => 'required',
            'id_pembeli' => 'required',
        ],
        [
            'jumlah.required' => 'Jumlah harus diisi',
            'tanggal_transaksi.required' => 'Tanggal transaksi harus diisi',
            'id_buku.required' => 'ID Buku harus diisi',
            'id_pembeli.required' => 'ID Pembeli harus diisi',
        ]);

        $transaksi = new transaksis();

        $transaksi->jumlah  = $request->jumlah;
        $transaksi->tanggal_transaksi  = $request->tanggal_transaksi;
        $transaksi->id_buku  = $request->id_buku;
        $transaksi->id_pembeli  = $request->id_pembeli;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transaksis::findOrFail($id);
        $buku = bukus::all();
        $pembeli = pembelis::all();
        return view('transaksi.show', compact('transaksi' , 'buku' , 'pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = transaksis::findOrFail($id);
        $buku = bukus::all();
        $pembeli = pembelis::all();
        return view('transaksi.edit', compact('transaksi' , 'buku' , 'pembeli'));
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
        $validated = $request->validate([
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required',
            'id_buku' => 'required',
            'id_pembeli' => 'required',
        ],
        [
            'jumlah.required' => 'Jumlah harus diisi',
            'tanggal_transaksi.required' => 'Tanggal transaksi harus diisi',
            'id_buku.required' => 'ID Buku harus diisi',
            'id_pembeli.required' => 'ID Pembeli harus diisi',
        ]);

        $transaksi = transaksis::findOrFail($id);

        $transaksi->jumlah  = $request->jumlah;
        $transaksi->tanggal_transaksi  = $request->tanggal_transaksi;
        $transaksi->id_buku  = $request->id_buku;
        $transaksi->id_pembeli  = $request->id_pembeli;
        $transaksi->save();   

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaksis::findOrFail($id)->delete();
            return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus');
    }
}
