<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = ['id','id_product','quantity','order_date', 'id_customer'];
    public $timestamps = true;

    //relasi ke tabel product  
    public function product()
    {
        return $this->belongsTo(products::class, 'id_product',);
    }

    public function customer()
    {
        return $this->belongsTo(customers::class, 'id_customer',);
    }
}