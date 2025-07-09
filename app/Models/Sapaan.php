<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sapaan extends Model
{
    protected $table = 'sapaan';

    protected $fillable = [
        'id',
        'nama'
    ];

    public function polis():BelongsToMany
    {
        return $this->belongsToMany(Poli::class, 'sapaan_poli','sapaan_id','Poli_id');
    }
}
