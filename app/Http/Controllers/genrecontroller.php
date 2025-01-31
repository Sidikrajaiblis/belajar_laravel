<?php

namespace App\Http\Controllers;

use App\Models\genres;
use Illuminate\Http\Request;

class genrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = genres::all();
        return view('genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = genres::all();
        return view('genre.create');
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
            'nama_genre' => 'required|min:5|max:255',
        ],
        [
            'nama_genre.required' => 'Nama Genre harus diisi',
            'nama_genre.min' => 'Nama Genre minimal 5 karakter',
            'nama_genre.max' => 'Nama Genre maksimal 255 karakter',
        ]);

        $genre = new genres();
        
        $genre->nama_genre  = $request->nama_genre;
        $genre->save();

        return redirect()->route('genre.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = genres::findOrFail($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = genres::findOrFail($id);
        return view('genre.edit', compact('genre'));
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
        genres::findOrFail($id)->update($request->all());
        return redirect()->route('genre.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        genres::findOrFail($id)->delete();
        return redirect()->route('genre.index')->with('success', 'Data berhasil dihapus');
    }
}
