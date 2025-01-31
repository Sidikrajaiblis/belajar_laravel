<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukus extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    protected $fillable = ['id','nama_buku','harga','stok','image','id_penerbit','tanggal_terbit','id_genre'];

    public function genre()
    {
        return $this->belongsTo(genres::class , 'id_genre');
    }

    public function penerbit()
    {
        return $this->belongsTo(penerbits::class , 'id_penerbit');
    }

    public function transaksi()
    {
        return $this->hasMany(transaksis::class);
    }
}
