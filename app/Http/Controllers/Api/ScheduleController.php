<?php

namespace App\Http\Controllers\Api;

use App\Derecho;
use App\Email;
use App\Feriado;
use App\Gozada;
use App\Horario;
use App\Http\Classes\Download;
use App\Http\Controllers\Controller;
use App\Periodo;
use App\Programada;
use App\Semestre;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ScheduleController extends Controller
{
  public function save(Request $request)
  {
    $cdocente = $request->docente['cdocente'];
      // Graba PROGRAMADAS
      // Elimina los registros 'new' dentro del rango
    $fini = date('Y-m-d', strtotime($request->fini));
    $ffin = date('Y-m-d', strtotime($request->ffin));
    $old = Programada::where('cdocente',$cdocente)
    ->where(function ($query) use ($fini, $ffin) {
      $query->where('fecha_ini', '>=' ,$fini)
      ->where('fecha_fin', '<=', $ffin);
    })
    ->orWhere(function ($query) use ($fini, $ffin){
      $query->where('fecha_ini', '<' ,$fini)
      ->where('fecha_fin', '>=', $fini);
    })
    ->orWhere(function ($query) use ($fini, $ffin){
      $query->where('fecha_fin', '>=' ,$ffin)
      ->where('fecha_ini', '>=', $ffin);
    })
    ->get();
    foreach ($old as $oldItem) {
      if($oldItem['type'] == 'new'){
        $record = Programada::findOrFail($oldItem['id']);
        $record->delete();
      }
    }
    $programadas = $request->programadas;
    foreach($programadas as $item){
      $fini = date('Y-m-d', strtotime($item['fecha_ini']));
      $ffin = date('Y-m-d', strtotime($item['fecha_fin']));
      if($item['type'] != 'closed'){
        if($item['type'] == 'new'){
          $new = new Programada;
          $new->cdocente = $cdocente;
          $new->fecha_ini = $fini;
          $new->fecha_fin = $ffin;
          $new->paso = $item['paso'];
          $new->maximo = $item['maximo'];
          $new->type = $item['type'];
          $new->save();
        }else{
          $old = Programada::findOrFail($item['id']);
          $old->fecha_ini = $fini;
          $old->fecha_fin = $ffin;
          $old->save();
        }
      }
    }
      // Graba HORARIOS
    $horarios = $request->horarios;
    foreach ($horarios as $item) {
      $registro = Horario::where('cdocente', $cdocente)
      ->where('semestre', $item['semestre'])
      ->where('dia', $item['dia'])
      ->first();
      if($registro){
            // modifica
          $registro->turno = $item['turno'];
          $registro->save();            

      }else{
            // crea nuevo registro
          $new = Horario::create([
            'cdocente' => $cdocente,
            'semestre' => $item['semestre'],
            'dia' => $item['dia'],
            'turno' => $item['turno']
          ]);
      }
    } 
    return ['success' => true];
  }
  public function savePeriodos(Request $request)
  {
    $cdocente = $request->cdocente;
    $periodos = $request->periodos;
    return ['success' => true, 'periodos' => $periodos];
  }

  public function create(Request $request)
  {
    Programada::create([
      'cdocente' => $request->cdocente,
      'periodo' => $request->periodo,
      'fecha_ini' => $request->fecha_ini,
      'fecha_fin' => $request->fecha_fin,
    ]);
    return ['success'=>true];
  }

  // TODO: Verificar si se usa o no
  public function index()
  {
    $users = User::all()->sortBy('name');
    return response($users, 200);
  }

  public static function data($docente_id)
  {
    $docente = User::findOrFail($docente_id);

    $cdocente = $docente->cdocente;
    $wdocente = $docente->wdocente;
    $periodos = Periodo::where('cdocente', $cdocente)->where('status', true)->get();
    $fini = date("Y-m-d");
    $ffin = date('Y-m-d', strtotime('1900-1-1'));
    foreach ($periodos as $periodo) {
      if( date('Y-m-d', strtotime($periodo->fecha_ini))<$fini){
        $fini = $periodo->fecha_ini;
      }
      if( date('Y-m-d', strtotime($periodo->fecha_fin))>$ffin){
        $ffin = $periodo->fecha_fin;
      }
    }
    $derechos = Derecho::where('cdocente', $cdocente)->get();
    $gozadas = Gozada::where('cdocente', $cdocente)
          ->where('fecha_ini','>=',$fini)->where('fecha_fin','<=',$ffin)->get();

    $all = Programada::where('cdocente', $cdocente)->get();
    $programadas = [];
    foreach ($all as $item) {
      if(( $item['fecha_ini'] >= $fini && $item['fecha_fin'] <= $ffin) 
        || ($item['fecha_ini'] < $fini && $item['fecha_fin'] >= $fini)
        || ($item['fecha_fin'] >= $ffin && $item['fecha_ini'] >= $ffin)){
        array_push($programadas, $item);
      }
    }


    $feriados = Feriado::where('fecha','>=',$fini)->where('fecha','<=',$ffin)->get();
    $horarios = Horario::where('cdocente', $cdocente)->get();
    $semestres = Semestre::where('status', true)->orderBy('fecha_ini')->get();
    $semestre1 = $semestres->first()->semestre;
    $parameters = [
      'horario' => [
        'qdias' => 5,
        'noches' => 3
      ],
      'turnos_sab' => [
        'noche', 
        'vacaciones', 
        'libre'
      ]
    ];

    $email = Email::where('user_id_to', $docente_id)
              ->orderByDesc('send_date')
              ->first();
    if(is_null($email)){
      $status = 'view';
      $tmail_id = false;
      $confirm = false;
    }else{
      if($email->reply_date == ''){
        $tmail_id = $email->tmail_id;
        if($email->limit_date > now()){
          $status = 'editable';
        }else{
          $status = 'view';
        }
        if($email->send_date == ''){
          $confirm = false;
        }else{
          $confirm = true;
        }
      }else{
        $status = 'view';
        $confirm = false;
        $tmail_id = false;
      }
    }
    return [
      'parameters' => $parameters,
      'docente' => [
        'id'=>$docente->id, 
        'cdocente'=> $cdocente,
        'wdocente'=> $wdocente,
      ],
      'periodos' => $periodos,
      'gozadas' => $gozadas,  
      'programadas' => $programadas,
      'feriados' => $feriados,
      'horarios' => $horarios, 
      'semestres' => $semestres,
      'derechos' => $derechos,
      'semestre' => $semestre1,
      'confirm' => $confirm,
      'status' => $status,
      'tmail_id' => $tmail_id
    ];
  }
}
