<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gozada extends Model
{
    protected $table = 'gozadas';
    protected $fillable = [
        'cdocente', 'fecha_ini', 'fecha_fin', 'observaciones'	
        ];

}
