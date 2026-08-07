<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atraksi extends Model
{
    protected $fillable = [
        'destinasi_id',
        'nama',
        'deskripsi',
        'kategori',
        'harga',
        'gambar',
    ];

   public function destinasi()
{
    return $this->belongsTo(Destinasi::class);
}

}

