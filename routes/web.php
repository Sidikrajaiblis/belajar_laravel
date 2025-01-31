<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\postscontroller;
use App\Http\Controllers\siswascontroller;
use App\Http\Controllers\ppdbscontroller;
use App\Http\Controllers\penggunascontroller;
use App\Http\Controllers\teleponcontroller;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\produkcontroller;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\ordercontroller;
use App\Http\Controllers\penerbitcontroller;
use App\Http\Controllers\genrecontroller;
use App\Http\Controllers\bukucontroller;
use App\Http\Controllers\pembelicontroller;
use App\Http\Controllers\transaksicontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function (){
    return 'Selamat datang di ABOUT';
});

Route::get('/home', function (){
    return 'Selamat datang di HOME';
});

Route::get('/contact', function (){
    return 'Selamat datang di CONTACT';
});

Route::get('/tes/{nama}/{tempat_lahir}/{jenis_kelamin}/{agama}/{alamat}', function ($nama,$lahir,$kelamin,$agama,$alamat){
    return "Nama : ".$nama."<br>" . 
           "Tempat Lahir :" . $lahir."<br>".
            "Jenis Kelamin : ".$kelamin."<br>" . 
            "agama : ".$agama."<br>" . 
            "Alamat : ".$alamat."<br>" ;
});

Route::get('/hitung/{a}/{b}', function ($bilangan1,$bilangan2){
           $hasil = $bilangan1 + $bilangan2 ;
    return "Bilangan 1 : " .$bilangan1. "<br>".
           "Bilangan 2 : " .$bilangan2. "<br>".
           "Hasil = ".$hasil ;
});

Route::get('/latihan1/{nama}/{telp}/{jenisbarang}/{namabarang}/{jumlah}/{pembayaran}', function($nama,$telpon,$jenis,$namabarang,$jumlah,$pembayaran){
        switch ($jenis) {
            case 'handphone':
                if ($namabarang == 'poco') {
                    $harga = 3000000;
                }elseif ($namabarang == 'samsung') {
                    $harga = 5000000;
                }elseif ($namabarang == 'iphone') {
                    $harga = 15000000;
                }
                break;
                case 'laptop':
                    if ($namabarang == 'lenovo') {
                        $harga = 4000000;
                    }elseif ($namabarang == 'acer') {
                        $harga = 8000000;
                    }elseif ($namabarang == 'mackbook') {
                        $harga = 20000000;
                    }
                    break;
                    case 'TV':
                        if ($namabarang == 'toshiba') {
                            $harga = 5000000;
                        }elseif ($namabarang == 'samsung') {
                            $harga = 8000000;
                        }elseif ($namabarang == 'LG') {
                            $harga = 10000000;
                        }
                        break;
            default:
               echo "barang tidak valid";
                break;
        }
        $total = $harga * $jumlah;

        if ($total > 10000000) {
            $cashback = 500000;
        }else {
            $cashback = 0 ;
        }

        if ($pembayaran == 'transfer') {
            $potongan = 50000;
        }elseif ($pembayaran == 'cash') {
            $potongan = 0;
        }else {
            echo "nguwawor";
        }

        $total_pembayaran = $total - $cashback -$potongan;

    return "Nama : ". $nama ."<br>".
            "Telepon : ". $telpon ."<hr>".
            "Jenis barang : ". $jenis ."<br>".
            "Nama Barang : ". $namabarang ."<br>".
            "Harga : ". number_format($harga) ."<br>".
            "Jumlah : ". $jumlah ."<hr>".
            "Total : ". number_format($total) ."<br>".
            "Cashback : ". $cashback ."<br>".
            "Pembayaran : ". $pembayaran ."<br>".
            "Potongan : ". number_format($potongan) ."<hr>".
            "Total pembayaran : ". number_format($total_pembayaran) ;
});

Route::get('/siswa', function () {

    $data_siswa = ['shiroko','hoshino',"serika","arona","nonomi"];
    
    return view('tampil',compact('data_siswa'));
});


// Route::get('/barang', function () {

//     $barang = barang::all();       
//     return view('tampil_barang',compact('barang'));
// });

Route::get('/post', [postscontroller::class,'menampilkan']);
Route::get('/barang', [postscontroller::class,'menampilkan2']);

route::resource('siswa',siswascontroller::class);
route::resource('ppdb',ppdbscontroller::class);
route::resource('pengguna',penggunascontroller::class);
route::resource('telepon',teleponcontroller::class);
route::resource('kategori',kategoricontroller::class);
route::resource('produk',produkcontroller::class);
route::resource('product',ProductsController::class);
route::resource('customer',customercontroller::class);
route::resource('order',ordercontroller::class);
route::resource('penerbit',penerbitcontroller::class);
route::resource('genre',genrecontroller::class);
route::resource('buku',bukucontroller::class);
route::resource('pembeli',pembelicontroller::class);
route::resource('transaksi',transaksicontroller::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', 'ProductController@create');
Route::Post('/store', 'ProductController@store');
