<?php

namespace App\Http\Controllers;

use App\Models\penerbits;
use Illuminate\Http\Request;

class penerbitcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = penerbits::all();
        return view('penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = penerbits::all();
        return view('penerbit.create');
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
            'nama_penerbit' => 'required|min:5|max:255',
        ],
        [
            'nama_penerbit.required' => 'Nama Penerbit harus diisi',
            'nama_penerbit.min' => 'Nama Penerbit minimal 5 karakter',
            'nama_penerbit.max' => 'Nama Penerbit maksimal 255 karakter',
        ]);

        $penerbit = new penerbits();

        $penerbit->nama_penerbit  = $request->nama_penerbit;
        $penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerbit = penerbits::findOrFail($id);
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerbit = penerbits::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
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
        $penerbit = penerbits::findOrFail($id);

        $penerbit->nama_penerbit  = $request->nama_penerbit;
        $penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penerbits::destroy($id);
        return redirect()->route('penerbit.index')->with('success', 'Data berhasil dihapus');
    }
}
