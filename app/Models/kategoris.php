<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoris extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama'];
    public $timestamps = true;

    //relasi ke tabel produk
    public function produk()
    {
        return $this->hasMany(produks::class);
    }
}
