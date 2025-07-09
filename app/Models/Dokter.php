<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'id',
        'nama',
        'notelp',
        'nik',
        'foto',
        'created_at',
        'updated_at',
    ];


    public function polis():BelongsToMany
    {
        return $this->belongsToMany(Poli::class, 'dokter_poli', 'dokter_id', 'poli_id');
    }

    public function jadwaldokters(): HasMany
    {
        return $this->hasMany(JadwalDokter::class);
    }
    public function dokterpolis(): HasMany
    {
        return $this->hasMany(DokterPoli::class);
    }
    public function reservasionlines(): HasMany
    {
        return $this->hasMany(ReservasiOnline::class);
    }
}

