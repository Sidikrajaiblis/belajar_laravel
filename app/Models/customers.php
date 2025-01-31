<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $fillable = ['id','name_customer','gender','contact'];
    public $timestamps = true;

    //relasi ke tabel order
    public function order()
    {
        return $this->hasMany(orders::class);
    }
}
