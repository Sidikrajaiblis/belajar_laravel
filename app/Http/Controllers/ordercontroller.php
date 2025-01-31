<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\products;
use App\Models\customers;

class ordercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = orders::all();
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = products::all();
        $customer = customers::all();
        return view('order.create', compact('product', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new orders();
        $order->id_product     = $request->id_product;      
        $order->quantity     = $request->quantity;
        $order->order_date   = $request->order_date;
        $order->id_customer  = $request->id_customer;
        $order->save();

        session()->flash('success', 'Data berhasil ditambahkan');

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = orders::find($id);
        $product = products::all();
        $customer = customers::all();
        return view('order.show', compact('order', 'product', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = orders::find($id);
        $product = products::all();
        $customer = customers::all();
        return view('order.edit', compact('order', 'product', 'customer'));
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
        $order = orders::findOrFail($id);
        $order->id_product     = $request->id_product;      
        $order->quantity     = $request->quantity;
        $order->order_date   = $request->order_date;
        $order->id_customer  = $request->id_customer;
        $order->save();

        session()->flash('success', 'Data berhasil diubah');

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        orders::findOrFail($id)->delete();
        session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('order.index');
    }
}
