<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keluhanPasien extends Model
{
    protected $table = 'keluhan_pasien';

    protected $fillable = [
        'pasien_id',
        'keluhan',
        'jenis_obat'
    ];
}
