<?php

namespace App;

use App\Trole;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'user_id', 
        'cdocente', 
        'trole_id', 
        'facultad_id', 
        'sede_id', 
        'swcierre', 
        'disp_id', 
        'dhora', 
        'dcurso', 
        'carga_id', 
        'carga'
    ];

    protected $append = ['trole'];

    function trole()
    {
        // $trole = Trole::findOrFail($this->trole_id);
        // return $trole->name;
        return $this->HasOne(Trole::class, 'id');
        // return $this->belongsToManyToOne(Trole::class, 'trole_id')->name;
    }

}
