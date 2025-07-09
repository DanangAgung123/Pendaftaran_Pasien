<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    protected $fillable = [
        'normx',
        'nokk',
        'nama',
        'sapaan',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'propinsi',
        'rt',
        'rw',
        'kodepos',
        'pekerjaan',
        'tmplahir',
        'tgllahir',
        'kelamin',
        'statuskawin',
        'pendidikan',
        'agama',
        'suku',
        'notelp',
        'noktp',
        'noasuransi',
        'kk',
        'umur',
        'namapasangan',
        'pekerjaanpasangan',
        'namabapak',
        'namaibu',
        'alamatskr',
        'kelurahanskr',
        'kecamatanskr',
        'kabuptenskr',
        'propinsiskr',
        'rtskr',
        'rwskr',
        'pekerjaanbapak',
        'pekerjaanibu',
        'bahasa',
        'penerjemah',
        'infodari',
        'username',
        'password',
    ];
    protected $table = 'pasien';

    public function reservasionlines(): HasMany
    {
        return $this->hasMany(ReservasiOnline::class);
    }
}
