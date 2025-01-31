<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksis extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $fillable = ['id','jumlah','tanggal_transaksi','id_buku','id_pembeli'];

    public function buku()
    {
        return $this->belongsTo(bukus::class , 'id_buku');
    }

    public function pembeli()
    {
        return $this->belongsTo(pembelis::class , 'id_pembeli');
    }

}
