<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = [
        'semestre', 'fecha_ini', 'fecha_fin', 'status'
    ];

}
