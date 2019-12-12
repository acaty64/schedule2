<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';
    protected $fillable = [
        'cdocente', 'periodo', 'fecha_ini', 'fecha_fin', 'status'
        ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'cdocente', 'cdocente');
    }
}
