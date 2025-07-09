<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Poli extends Model
{
    protected $table = 'poli';

    protected $fillable = [
        'id',
        'namaunit',
        'poli_id',
        'created_at',
        'updated_at',
    ];

    public function dokters():BelongsToMany
    {
        return $this->belongsToMany(Dokter::class, 'dokter_poli','poli_id','dokter_id');
    }
    
    public function jadwaldokters(): HasMany
    {
        return $this->hasMany(JadwalDokter::class);
    }
    public function dokterpolis(): HasMany
    {
        return $this->hasMany(DokterPoli::class);
    }

    public function sapaans():BelongsToMany
    {
        return $this->belongsToMany(Sapaan::class, 'sapaan_poli','poli_id','sapaan_id');
    }
    public function reservasionlines(): HasMany
    {
        return $this->hasMany(ReservasiOnline::class);
    }
}
