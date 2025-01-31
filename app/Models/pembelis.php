<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelis extends Model
{
    use HasFactory;

    protected $table = 'pembelis';
    protected $fillable = ['nama_pembeli', 'jenis_kelamin', 'telepon'];

    public function transaksi()
    {
        return $this->hasMany(transaksis::class);
    }
}
