<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['id','name_product','merk','price','stock'];
    public $timestamps = true;

    //relasi ke tabel order
    public function order()
    {
        return $this->hasMany(orders::class);
    }

    //menghapus image
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/products/' . $this->cover))) {
            return unlink(public_path('images/product/' . $this->cover));
        }
    }
}
