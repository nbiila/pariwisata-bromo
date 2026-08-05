<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atraksi extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori',
        'harga',
        'gambar',
    ];

   
}