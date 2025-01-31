<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbits extends Model
{
    use HasFactory;

    protected $table = 'penerbits';
    protected $fillable = ['id','nama_penerbit'];
    
    public function buku()
    {
        return $this->hasMany(bukus::class);
    }
}
