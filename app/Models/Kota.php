<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $fillable = [
        'id',
        'kode',
        'propinsi',
        'kdKotaKab',
        'kabupaten',
        'kdKec',
        'kecamatan',
        'kdDes',
        'kelurahan',
        'kodePos',
        'created_at',
        'updated_at'
    ];
}
