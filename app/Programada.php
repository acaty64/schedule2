<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Programada extends Model
{
    protected $table = 'programadas';
    protected $appends = [
        'dias', 
        'opciones'
    ];
    protected $fillable = [
            'cdocente', 
            'fecha_ini', 
            'fecha_fin',
            'minimo',
            'paso',
            'maximo',
            'type',
        ];

    public function getOpcionesAttribute()
    {
        $opciones = [];
        $opcion = $this->minimo;
        while ($opcion <= $this->maximo) {
            array_push($opciones, $opcion);
            $opcion += $this->paso;
        }
        if($opcion != $this->maximo){
            array_push($opciones, $this->maximo);
        }
        return $opciones;
    }

    public function getDiasAttribute()
    {
    	// $fecha = $this->dmy2mdy($this->fecha_ini);
    	// $dStart = new DateTime($fecha);
     //    if($this->fecha_ini instanceof DateTime){
     //        $dStart = $this->fecha_ini;
     //    }else{
     //    	$dStart = DateTime::createFromFormat('d/m/Y', $this->fecha_ini);
     //    }
    	// $dEnd = DateTime::createFromFormat('d/m/Y', $this->fecha_fin);
    	// $fecha = $this->dmy2mdy($this->fecha_fin);
    	// $dEnd = new DateTime($fecha);
$dStart = DateTime::createFromFormat('Y-m-d', $this->fecha_ini);
$dEnd = DateTime::createFromFormat('Y-m-d', $this->fecha_fin);
    	return $dDiff = $dStart->diff($dEnd)->format('%r%a')+1;
    }

    // private function dmy2mdy($string)
    // {
    // 	// dd/mm/yyyy
    // 	// 0123456789
    // 	$dd = substr($string,0,2);
    // 	$mm = substr($string,3,2);
    // 	$yyyy = substr($string,6,4);
    // 	return $mm . '-' . $dd . '-' . $yyyy;
    // }

}
