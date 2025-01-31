<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produks extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_produk','harga','stok', 'kategori_id'];
    public $timestamps = true;

    //relasi ke tabel kategori  
    public function kategori()
    {
        return $this->belongsTo(kategoris::class, 'kategori_id',);
    }
}
