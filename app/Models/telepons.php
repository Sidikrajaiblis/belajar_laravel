<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telepons extends Model
{
    use HasFactory;

    protected $fillable = ['id','nomor', 'pengguna_id'];
    public $timestamps = true;

    //relasi ke tabel pengguna  
    public function pengguna()
    {
        return $this->belongsTo(penggunas::class, 'pengguna_id',);
    }
}
