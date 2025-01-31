<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penggunas;

class penggunascontroller extends Controller
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
        $pengguna = penggunas::all();
        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengguna = new penggunas;

        $pengguna->nama = $request->nama;
        $pengguna->save();

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = penggunas::findOrFail($id);
        return view('pengguna.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = penggunas::findOrFail($id);
        return view('pengguna.edit', compact('pengguna'));
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
        $pengguna = penggunas::findOrFail($id);
        $pengguna->id = $request->id;
        $pengguna->nama = $request->nama;
        $pengguna->save();

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penggunas::findOrFail($id)->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data berhasil dihapus');
    }
}
