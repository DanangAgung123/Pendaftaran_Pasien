<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservasiOnline extends Model
{
    protected $table = 'reservasi_online';

    protected $fillable = [
        'id',
        'pasien_id',
        'uuid',
        'kso_id',
        'poli_id',
        'dokter_id',
        'jadwal_dokter_id',
        'waktu_poli',
        'tgl_kunjungan',
        'hari_kunjungan',
        'no_tlp',
        'tgl_daftar',
        'no_reservasi',
        'no_antrian',
        'is_called',
        'created_at',
        'updated_at'
    ];

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class,'dokter_id');
    }

    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class,'pasien_id');
    }
    public function jadwaldokter(): BelongsTo
    {
        return $this->belongsTo(JadwalDokter::class,'jadwal_dokter_id');
    }
}
