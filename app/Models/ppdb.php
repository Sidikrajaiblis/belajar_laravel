<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppdb extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap','jenis_kelamin','agama','alamat','telpon','asal_sekolah'];
    public $timestamps = true;
}
