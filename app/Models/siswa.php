<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nis','nama','jenis_kelamin','kelas'];
    public $timestamps = true;

    //menghapus image
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/siswa/' . $this->cover))) {
            return unlink(public_path('images/siswa/' . $this->cover));
        }
    }
}
