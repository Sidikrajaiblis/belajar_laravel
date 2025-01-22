<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\barang;


class postscontroller extends Controller
{
    public function menampilkan(){
        $posts = post::all();
        return view('tampil_post',compact('posts'));
    }
    public function menampilkan2(){
        $barang = barang::all();       
        return view('tampil_barang',compact('barang'));
    }
}
