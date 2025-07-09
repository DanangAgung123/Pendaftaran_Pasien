<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'id_berita',
        'judul',
        'keterangan',
        'gambar',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'id_berita';
}
