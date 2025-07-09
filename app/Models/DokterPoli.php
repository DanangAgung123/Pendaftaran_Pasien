<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokterPoli extends Model
{
    protected $table = 'dokter_poli';

    protected $fillable = [
        'id',
        'dokter_id',
        'namadokter',
        'poli_id',
        'namaunit',
        'updated_at',
        'created_at',
    ];

    // public function jadwaldokters(): HasMany
    // {
    //     return $this->hasMany(JadwalDokter::class);
    // }
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class,'dokter_id');
    }
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

}

