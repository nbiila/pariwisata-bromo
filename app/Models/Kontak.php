<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak'; // sesuaikan kalau nama tabelmu beda, misal 'pesan' atau 'kontaks'

    protected $fillable = [
        'nama', 'email', 'pesan',
    ];
}