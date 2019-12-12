<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Derecho extends Model
{
    protected $table = 'derechos';
    protected $fillable = [
        'cdocente', 'periodo', 'dias'	
        ];
}
