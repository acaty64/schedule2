<?php

namespace App\Http\Controllers\Api;

use App\Feriado;
use App\Ganada;
use App\Horario;
use App\Http\Controllers\Controller;
use App\Periodo;
use App\Programada;
use App\User;
use Illuminate\Http\Request;

class XXXXScheduleController extends Controller
{
    public function savePeriodos(Request $request)
    {
        $cod_doc = $request->cod_doc;
        $periodos = $request->periodos;
        // foreach ($periodos as $item) {
        //     $periodo = Periodo::find($item->id);
        //     $periodo->fecha_ini = date_format($item->fecha_ini, 'd/m/Y';
        //     $periodo->fecha_fin = date_format($item->fecha_fin, 'd/m/Y';
        // }
        return ['success' => true, 'periodos' => $periodos];
    }
    public function create(Request $request)
    {
        Programada::create([
            'cod_doc' => $request->cod_doc,
            'periodo' => $request->periodo,
            'fecha_ini' => $request->fecha_ini,
            'fecha_fin' => $request->fecha_fin,
        ]);
        return ['success'=>true];
    }
    public function index()
    {
        $users = User::all()->sortBy('name');
        $users->map(function($user){
            $user->fecha_fin = $user->periodo->fecha_fin;
        });
        return response($users, 200);
    }
    public function data($cod_doc)
    {
    	$docente = User::where('cod_doc', $cod_doc)->first();
    	$periodo_vigente = Periodo::where('cod_doc', $cod_doc)->first();
    	$periodo = $periodo_vigente->periodo;
    	$datos = Ganada::where('cod_doc', $cod_doc)
    		->where('periodo', $periodo)->first();
    	$ganadas = $datos->dias;
    	$datos = Programada::where('cod_doc', $cod_doc)
    		->where('periodo', $periodo)->get();
    	$programadas = [];
    	foreach ($datos as $value) {
    		$data = [$value->fecha_ini, $value->fecha_fin];
    		array_push($programadas, $data);
    	}
    	$vacaciones = [
    		'ganadas' => $ganadas,
    		'programadas' => $programadas,
    		'fini' => $periodo_vigente->fecha_ini,
    		'ffin' => $periodo_vigente->fecha_fin,
    	];
    	$feriados = Feriado::all()->toArray();
    	$horarios = Horario::where('cod_doc', $cod_doc)->get();
        $semestres = $horarios->unique('semestre');
        $horario1 = [];
        $dias = [
                '1' => 'LUN',
                '2' => 'MAR',
                '3' => 'MIE',
                '4' => 'JUE',
                '5' => 'VIE',
                '6' => 'SAB',
            ];
        foreach ($semestres as $key0 => $value0) {
            $data0 = Horario::where('cod_doc', $cod_doc)->where('semestre', $value0->semestre)->get();
            $data1 = [];
            foreach ($data0 as $key1 => $value1) {
                foreach ($dias as $key2 => $value2) {
                    if($value1->dia == $value2){
                        $ndia = $key2;
                    }
                }
                array_push($data1, [
                    $ndia, $value1->turno
                ]);
            }
            $object = (object)[
                $value0->semestre => $data1
            ];
            array_push($horario1, (object) $object);
        }
        return [
    		'periodo' => $periodo,
    		'wdocente' => $docente->name,
    		'vacaciones' => $vacaciones,
    		'feriados' => $feriados,
            'horario' => $horario1, 
    	];
    }
}
