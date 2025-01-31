<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductsController extends Controller
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
        $product = products::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = products::all();
        return view('product.create');
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
            'name_product' => 'required|min:5|max:255',
            'merk' => 'required|min:5|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ],
        [
            'name_product.required' => 'Nama Produk harus diisi',
            'name_product.min' => 'Nama Produk minimal 5 karakter',
            'name_product.max' => 'Nama Produk maksimal 255 karakter',
            'merk.required' => 'Merk harus diisi',
            'merk.min' => 'Merk minimal 5 karakter',
            'merk.max' => 'Merk maksimal 255 karakter',
            'price.required' => 'Harga harus diisi',
            'price.numeric' => 'Harga harus angka',
            'stock.required' => 'Stock harus diisi',
            'stock.integer' => 'Stock harus angka',
        ] );

        $product = new Products();
        $product->name_product  = $request->name_product;
        $product->merk  = $request->merk;
        $product->price  = $request->price;
        $product->stock  = $request->stock;

        if($request->hasFile('cover')){
            $img = $request->file('cover');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/product', $name);
            $product->cover = $name;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = products::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::findOrFail($id);
        $product->name_product  = $request->name_product;
        $product->merk  = $request->merk;
        $product->price  = $request->price;
        $product->stock  = $request->stock;

        if($request->hasFile('cover')){
            $product->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/product', $name);
            $product->cover = $name;
        }

        $product->save();   

        return redirect()->route('product.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::findOrFail($id)->delete();
        return redirect()->route('product.index')->with('success', 'Data berhasil dihapus');
    }
}
