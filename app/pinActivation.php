<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinActivation extends Model
{
    protected $table = 'pin_activation';

    protected $fillable = [
        'pasien_id',
        'kode'
    ];

}
