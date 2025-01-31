<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoris;

class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //   $this->middleware('auth');

    // }
    public function index()
    {
        $kategori = kategoris::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategoris::all();
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new kategoris();

        $kategori->nama_kategori  = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategoris::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategoris::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
        $kategori = kategoris::findOrFail($id);
        $kategori->nama_kategori  = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategoris::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
