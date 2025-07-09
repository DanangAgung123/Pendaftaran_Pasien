<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HariLibur extends Model
{
    protected $table = 'hari_libur';
    protected $fillable = [
        'id',
        'tanggal',
        'bulan',
        'tahun',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
