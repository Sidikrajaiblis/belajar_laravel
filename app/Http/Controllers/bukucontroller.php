<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bukus;
use App\Models\genres;
use App\Models\penerbits;

class bukucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = bukus::all();
        return view('buku.index', compact('buku')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = bukus::all();
        $penerbit = penerbits::all();
        $genre = genres::all();
        return view('buku.create', compact('penerbit', 'genre'));
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
            'nama_buku'      => 'required|min:5|max:255',
            'harga'          => 'required',
            'stok'           => 'required',
            'image'          => 'required',
            'id_penerbit'    => 'required',
            'tanggal_terbit' => 'required',
            'id_genre'       => 'required',
        ],
        [
            'nama_buku.required'      => 'Nama Buku harus diisi',
            'nama_buku.min'           => 'Nama Buku minimal 5 karakter',
            'nama_buku.max'           => 'Nama Buku maksimal 255 karakter',
            'harga.required'          => 'Harga harus diisi',
            'stok.required'           => 'Stok harus diisi',
            'image.required'          => 'Image harus diisi',
            'id_penerbit.required'    => 'ID Penerbit harus diisi',
            'tanggal_terbit.required' => 'Tanggal Terbit harus diisi',
            'id_genre.required'       => 'ID Genre harus diisi',
        ]);

        $buku = new bukus();
        $buku->nama_buku      = $request->nama_buku;
        $buku->harga          = $request->harga;
        $buku->stok           = $request->stok;
        $buku->image          = $request->image;
        $buku->id_penerbit    = $request->id_penerbit;
        $buku->tanggal_terbit = $request->tanggal_terbit;
        $buku->id_genre       = $request->id_genre;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();

        session()->flash('success', 'Data berhasil ditambahkan');

        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = bukus::findOrFail($id);
        $penerbit = penerbits::all();
        $genre = genres::all();
        return view('buku.show', compact('buku', 'penerbit', 'genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = bukus::findOrFail($id);
        $penerbit = penerbits::all();
        $genre = genres::all();
        return view('buku.edit', compact('buku', 'penerbit', 'genre'));
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
            'nama_buku'      => 'required|min:5|max:255',
            'harga'          => 'required',
            'stok'           => 'required',
            'image'          => 'required',
            'id_penerbit'    => 'required',
            'tanggal_terbit' => 'required',
            'id_genre'       => 'required',
        ],
        [
            'nama_buku.required'      => 'Nama Buku harus diisi',
            'nama_buku.min'           => 'Nama Buku minimal 5 karakter',
            'nama_buku.max'           => 'Nama Buku maksimal 255 karakter',
            'harga.required'          => 'Harga harus diisi',
            'stok.required'           => 'Stok harus diisi',
            'image.required'          => 'Image harus diisi',
            'id_penerbit.required'    => 'ID Penerbit harus diisi',
            'tanggal_terbit.required' => 'Tanggal Terbit harus diisi',
            'id_genre.required'       => 'ID Genre harus diisi',
        ]);

        $buku = bukus::findOrFail($id);
        $buku->nama_buku      = $request->nama_buku;
        $buku->harga          = $request->harga;
        $buku->stok           = $request->stok;
        $buku->image          = $request->image;
        $buku->id_penerbit    = $request->id_penerbit;
        $buku->tanggal_terbit = $request->tanggal_terbit;
        $buku->id_genre       = $request->id_genre;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();

        session()->flash('success', 'Data berhasil diubah');

        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            bukus::findOrFail($id)->delete();
            return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
}
