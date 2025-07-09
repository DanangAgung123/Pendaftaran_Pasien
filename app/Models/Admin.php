<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $fillable = [
        'id',
       'nama',
       'username',
       'password',
       'level',
       'created_at',
       'updated_at', 
    ];
}
