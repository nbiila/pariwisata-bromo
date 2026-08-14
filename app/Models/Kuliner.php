<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $table = 'kuliner';

    protected $fillable = [
        'nama',
        'harga',
        'foto',
        'deskripsi',
        'lokasi_ditemukan',
    ];
}