<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalDokter extends Model
{
    protected $table = 'jadwal_dokter';

    protected $fillable = [
        'id',
        'dokter_id',
        'namadokter',
        'poli_id',
        'namaunit',
        'tgl',
        'hari',
        'mulai',
        'selesai',
        'kuota',
        'praktek',
        'waktu_poli',
        'created_at',
        'updated_at',
    ];

    // public function dokterpoli(): BelongsTo
    // {
    //     return $this->belongsTo(DokterPoli::class,'dokter_poli_id');
    // }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class,'dokter_id');
    }
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
    public function reservasionlines(): HasMany
    {
        return $this->hasMany(ReservasiOnline::class);
    }
}
