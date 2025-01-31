<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\telepons;
use App\Models\penggunas;

class teleponcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telepon = telepons::all();
        return view('telepon.index', compact('telepon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = penggunas::all();
        return view('telepon.create', compact('pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telepon = new telepons;
        $telepon->nomor        = $request->nomor;
        $telepon->pengguna_id  = $request->pengguna_id;
        $telepon->save();

        session()->flash('success', 'Data berhasil ditambahkan');

        return redirect()->route('telepon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telepon = telepons::findOrFail($id);
        return view('telepon.show', compact('telepon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telepon = telepons::findOrFail($id);
        $pengguna = penggunas::all();
        return view('telepon.edit', compact('telepon', 'pengguna'));
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
        $telepon = telepons::findOrFail($id);
        $telepon->nomor        = $request->nomor;
        $telepon->pengguna_id  = $request->pengguna_id;
        $telepon->save();

        session()->flash('success', 'Data berhasil diupdate');

        return redirect()->route('telepon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        telepons::findOrFail($id)->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('telepon.index');
    }
}
