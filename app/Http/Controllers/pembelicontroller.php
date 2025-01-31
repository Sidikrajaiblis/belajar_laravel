<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembelis;

class pembelicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = pembelis::all();
        return view('pembeli.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembeli = pembelis::all();
        return view('pembeli.create');
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
            'nama_pembeli' => 'required|min:5|max:255',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|numeric',
        ],
        [
            'nama_pembeli.required' => 'Nama Pembeli harus diisi',
            'nama_pembeli.min' => 'Nama Pembeli minimal 5 karakter',
            'nama_pembeli.max' => 'Nama Pembeli maksimal 255 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.numeric' => 'Telepon harus berupa angka',
        ]);

        $pembeli = new pembelis();
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->jenis_kelamin = $request->jenis_kelamin;
        $pembeli->telepon = $request->telepon;
        $pembeli->save();
        return redirect()->route('pembeli.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = pembelis::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = pembelis::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
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
            'nama_pembeli' => 'required|min:5|max:255',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|numeric',
        ],
        [
            'nama_pembeli.required' => 'Nama Pembeli harus diisi',
            'nama_pembeli.min' => 'Nama Pembeli minimal 5 karakter',
            'nama_pembeli.max' => 'Nama Pembeli maksimal 255 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.numeric' => 'Telepon harus berupa angka',
        ]);

        $pembeli = pembelis::findOrFail($id);

        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->jenis_kelamin = $request->jenis_kelamin;
        $pembeli->telepon = $request->telepon;
        $pembeli->save();

        return redirect()->route('pembeli.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pembelis::destroy($id);
        return redirect()->route('pembeli.index')->with('success', 'Data berhasil dihapus');
    }
}
