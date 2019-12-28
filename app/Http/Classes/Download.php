<?php

namespace App\Http\Classes;

use App\Feriado;
use App\Gozada;
use App\Horario;
use App\Periodo;
use App\Programada;
use App\Semestre;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Api\ScheduleController as Schedule;
use PDF;

class Download 
{

  var $docente_id;

  public static function dataReport($docente_id)
  {
    $user = User::findOrFail($docente_id);
    $cdocente = $user->cdocente;
    $periodos = Periodo::where('cdocente', $cdocente)->where('status', true)->get();
    $programadas = Programada::where('cdocente', $cdocente)->get();

    $pre = Horario::where('cdocente', $cdocente)->get();
    $semestres = Semestre::where('status', true)->get();

    $horarios = [];
    foreach ($semestres as $semestre) {
      $horario = [
        'semestre' => $semestre->semestre,
        'fecha_ini' => $semestre->fecha_ini,
        'fecha_fin' => $semestre->fecha_fin,
        'LUN' => '',
        'MAR' => '',
        'MIE' => '',
        'JUE' => '',
        'VIE' => '',
        'SAB' => '',
        'status' => true
      ];
      $dias = $pre->where('semestre', $semestre->semestre);
      foreach ($dias as $dia) {
        $horario[$dia->dia] = $dia->turno;
      }
      array_push($horarios, $horario);
    }

    foreach ($horarios as $key=>$h) {
      foreach ($programadas as $p) {
        if($h['fecha_ini'] >= $p['fecha_ini'] && $h['fecha_fin'] <= $p['fecha_fin']){
          $horarios[$key]['status'] = false;
        }
      }
    }

    foreach ($horarios as $key => $h) {
      if($h['status'] == false){
        $horarios[$key]['LUN'] = 'vacaciones';
        $horarios[$key]['MAR'] = 'vacaciones';
        $horarios[$key]['MIE'] = 'vacaciones';
        $horarios[$key]['JUE'] = 'vacaciones';
        $horarios[$key]['VIE'] = 'vacaciones';
        $horarios[$key]['SAB'] = 'vacaciones';
      }
    }

    foreach ($horarios as $key => $h) {
      foreach (['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'] as $key2 => $d) {
        if($h[$d] == 'vacaciones'){
          $horarios[$key][$d] = 'vacs';
        }
      }
    }

    $docente = $user;

    $data = [
      'docente' => $user,
      'periodos' => $periodos,
      'programadas' => $programadas,
      'horarios' => $horarios,
    ];

    return $data;
  }

  public static function reportDownload($docente_id, $output)
  {
    $data = Download::dataReport($docente_id);
    $data['type'] = 'PDF';
    $user = User::findOrFail($docente_id);
    $file_to_attach = storage_path() . DIRECTORY_SEPARATOR . 'reports' .  DIRECTORY_SEPARATOR . 'report_' . $user->cdocente . '.pdf';
    $file_name = 'report_' . $user->wdocente . '.pdf';    

    if(file_exists($file_to_attach)){
      unlink($file_to_attach);
    }

    $vista = 'app.schedule.report';
    try {
      $pdf = PDF::loadView($vista, compact('data'))
                    ->setPaper('a4')
                    ->setOption('margin-top', 25)
                    ->setOrientation('Portrait');
      $pdf->save($file_to_attach);
    } catch (Exception $e) {
      return ['success'=>'false', 'error' => $e];
    }  
    if(file_exists($file_to_attach)){
      if($output == 'pc'){
        $pdf->download($file_name);
        flash('Archivo: ' . $file_name . ' descargado.')->success();
        return redirect(route('app.schedule.index'));
      }else{
        return ['success' => true, 'file_to_attach' => $file_to_attach, 'file_name' => $file_name];
      }
    }
  }

  public static function cronoDownload($docente_id, $output)
  {
    $data = Download::dataCrono($docente_id);

    $data['type'] = 'PDF';
    $user = User::findOrFail($docente_id);
    $file_to_attach = storage_path() . DIRECTORY_SEPARATOR . 'reports' .  DIRECTORY_SEPARATOR . 'crono_' . $user->cdocente . '.pdf';
    $file_name = 'crono_' . $user->wdocente . '.pdf';    

    if(file_exists($file_to_attach)){
      unlink($file_to_attach);
    }

    $vista = 'app.schedule.crono';
    try {
      $pdf = PDF::loadView($vista, compact('data'))
                    ->setPaper('a4')
                    ->setOption('margin-top', 25)
                    ->setOrientation('Portrait');
      $pdf->save($file_to_attach);
    } catch (Exception $e) {
      return ['success'=>'false', 'error' => $e];
    }  
    if(file_exists($file_to_attach)){
      if($output == 'pc'){
        $pdf->download($file_name);
        flash('Archivo: ' . $file_name . ' descargado.')->success();
        return redirect(route('app.schedule.index'));
      }else{
        return ['success' => true, 'file_to_attach' => $file_to_attach, 'file_name' => $file_name];
      }
    }
  }
  
  public static function dataCrono($docente_id)
  {
    $data = Schedule::data($docente_id);

    $docente = $data['docente'];
    $cdocente = $docente['cdocente'];
    $wdocente = $docente['wdocente'];

    $feriados = Feriado::all();
    $gozadas = Gozada::where('cdocente', $cdocente);
    $semestres = Semestre::where('status', true)->get();

    // Define fini y ffin segun los periodos vigentes
    $periodos = $data['periodos'];
    $fini = date("Y-m-d");    // Desde hoy
    // $ffin = date('Y-m-d', strtotime('1900-1-1'));
    $ffin = $fini;
    foreach ($periodos as $periodo) {
      if( date('Y-m-d', strtotime($periodo['fecha_fin']))>$ffin){
        $ffin = $periodo['fecha_fin'];
      }
    }
    // Crea el calendario desde fini a ffin
    $fecha = Carbon::parse($fini);
    $ffin = Carbon::parse($ffin);
    $rango = $fecha->diffInDays($ffin)+1;
    $calendar = [];
    for ($d=0; $d < $rango; $d++) {
      if ( date('w', strtotime($fecha))==0 ){
        $status = 'domingo';
      }else{
        $status = 'habil';
      }
      $item =  [
        'id' => $d,
        'semana' => 0,
        'ndia' => date('w', strtotime($fecha)),
        'fecha' => $fecha->format("Y-m-d"),
        'status' => $status,
        'color' => ''
      ];
      array_push($calendar, $item);
      $fecha->addDay(1);
    }
    // Agrega los feriados
    // $feriados = $data['feriados'];
    foreach ($feriados as $feriado) {
      $fecha = $feriado['fecha'];
      foreach ($calendar as $dia) {
        if($dia['fecha'] == $fecha){
          $calendar[$dia['id']]['status'] = 'feriado';
        }
      }
    }
    // Agrega las vacaciones gozadas
    // $gozadas = $data['gozadas'];
    foreach ($gozadas as $rango) {
      $fecha = Carbon::parse($rango['fecha_ini']);
      $fecha_fin = Carbon::parse($rango['fecha_fin']);
      $rango = $fecha->diffInDays($fecha_fin)+1;
      for ($d=0; $d < $rango; $d++) {
        foreach ($calendar as $dia) {
          if( Carbon::parse($dia['fecha']) == $fecha){
            $calendar[$dia['id']]['status'] = 'gozadas';
          }
        }
        $fecha->addDay(1);
      }
    }
    // Agrega las vacaciones programadas
    $programadas = $data['programadas'];
    foreach ($programadas as $rango) {
      $fecha = Carbon::parse($rango['fecha_ini']);
      $fecha_fin = Carbon::parse($rango['fecha_fin']);
      $rango = $fecha->diffInDays($fecha_fin)+1;
      for ($d=0; $d < $rango; $d++) {
        foreach ($calendar as $dia) {
          if( Carbon::parse($dia['fecha']) == $fecha){
            $today = Carbon::today()->endOfDay();
            if($fecha < $today){
              $calendar[$dia['id']]['status'] = 'gozadas';
            }else{
              $calendar[$dia['id']]['status'] = 'vacaciones';
            }
          }
        }
        $fecha->addDay(1);
      }
    }
    // Agrega los horarios (dia, noche, vacaciones)
    // $semestres = $data['semestres'];
    // $semestres = Semestre::where('status', true)->get();
    $horarios = $data['horarios'];
    // $horarios = Horario::where('cdocente', $cdocente)->get();
    foreach ($horarios as $horario) {
      $semana = ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
      $weekDay = array_search($horario['dia'], $semana);
      foreach ($semestres as $semestre) {
        if( $semestre['semestre'] == $horario['semestre'] ){
          $fecha = Carbon::parse($semestre['fecha_ini']);
          $fecha_fin = Carbon::parse($semestre['fecha_fin']);
          $rango = $fecha->diffInDays($fecha_fin)+1;
          for ( $d=0; $d < $rango; $d++ ) {
            if ( date('w', strtotime($fecha)) == $weekDay ){
              foreach ($calendar as $dia) {
                if( Carbon::parse($dia['fecha']) == $fecha && $calendar[$dia['id']]['status'] == 'habil' ){
                  // $calendar[$dia['id']]['status'] = 'vacaciones';
                  $calendar[$dia['id']]['status'] = $horario['turno'];
                }
              }
            }
            $fecha->addDay(1);
          }
        }
      }
    }
    // // Filtra desde hoy()
    // Genera el calendario semana x semana
    $key_first = array_keys($calendar)[0];
    $fechas = [];
    $dia = date('w', strtotime($calendar[$key_first]['fecha']));
    for ($i=0; $i < $dia; $i++) { 
      $item =  [
        'id' => -1,
        'semana' => 1,
        'fecha' => '',
        'ndia' => $i,
        'status' => 'blanco',
        'color' => ''
      ];
      array_push($fechas, $item);
    }
    foreach ($calendar as $fecha) {
      array_push($fechas, $fecha);
    }
    $calendario = [];
    $semana = [];
    for ($i=0; $i < count($fechas); $i++) { 
      $fechas[$i]['semana'] = intdiv($i, 7);
    }
    for ($n=0; $n < intdiv(count($fechas), 7); $n++) {
      $semana = array_filter($fechas, function ($fecha) use($n)
      {
        return $fecha['semana'] == $n;
      });
      // Define mes
      $meses = ['Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'];

      foreach ($semana as $dia) {
        if ($dia['fecha'] != ''){
          $mes = date('n', strtotime($dia['fecha']));
          $anho = date('Y', strtotime($dia['fecha']));
        }
      }
      array_push($calendario, ['mes'=> $meses[$mes-1].' '.$anho, 'semana'=>$semana]);
    }
    $parameters = [
      'width' => 50,
      'height' =>25
    ];
    return [
      'docente' => $docente,
      'data' => $calendario,
      'param' => $parameters,
    ];
  }
}
