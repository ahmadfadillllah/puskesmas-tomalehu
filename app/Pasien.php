<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'nik_ktp',
        'nama_lengkap',
        'umur',
        'jenis_kelamin',
        'alamat',
        'no_hp'
    ];
}
