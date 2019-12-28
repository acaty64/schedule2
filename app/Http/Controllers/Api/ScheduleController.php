<?php

namespace App\Http\Controllers\Api;

use App\Derecho;
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
  // public function dataReport($docente_id)
  // {
  //   $user = User::findOrFail($docente_id);
  //   $cdocente = $user->cdocente;
  //   $periodos = Periodo::where('cdocente', $cdocente)->where('status', true)->get();
  //   $programadas = Programada::where('cdocente', $cdocente)->get();

  //   $pre = Horario::where('cdocente', $cdocente)->get();
  //   $semestres = Semestre::where('status', true)->get();

  //   $horarios = [];
  //   foreach ($semestres as $semestre) {
  //     $horario = [
  //       'semestre' => $semestre->semestre,
  //       'fecha_ini' => $semestre->fecha_ini,
  //       'fecha_fin' => $semestre->fecha_fin,
  //       'LUN' => '',
  //       'MAR' => '',
  //       'MIE' => '',
  //       'JUE' => '',
  //       'VIE' => '',
  //       'SAB' => '',
  //       'status' => true
  //     ];
  //     $dias = $pre->where('semestre', $semestre->semestre);
  //     foreach ($dias as $dia) {
  //       $horario[$dia->dia] = $dia->turno;
  //     }
  //     array_push($horarios, $horario);
  //   }

  //   foreach ($horarios as $key=>$h) {
  //     foreach ($programadas as $p) {
  //       if($h['fecha_ini'] >= $p['fecha_ini'] && $h['fecha_fin'] <= $p['fecha_fin']){
  //         $horarios[$key]['status'] = false;
  //       }
  //     }
  //   }

  //   foreach ($horarios as $key => $h) {
  //     if($h['status'] == false){
  //       $horarios[$key]['LUN'] = 'vacaciones';
  //       $horarios[$key]['MAR'] = 'vacaciones';
  //       $horarios[$key]['MIE'] = 'vacaciones';
  //       $horarios[$key]['JUE'] = 'vacaciones';
  //       $horarios[$key]['VIE'] = 'vacaciones';
  //       $horarios[$key]['SAB'] = 'vacaciones';
  //     }
  //   }

  //   foreach ($horarios as $key => $h) {
  //     foreach (['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'] as $key2 => $d) {
  //       if($h[$d] == 'vacaciones'){
  //         $horarios[$key][$d] = 'vacs';
  //       }
  //     }
  //   }


  //   $docente = $user;

  //   $data = [
  //     'docente' => $user,
  //     'periodos' => $periodos,
  //     'programadas' => $programadas,
  //     'horarios' => $horarios
  //   ];

  //   return $data;
  // }

  // public function reportShow($docente_id)
  // {
  //   if(\Auth::user()->isAdmin 
  //     || \Auth::user()->isMaster
  //     || \Auth::user()->id == $docente_id){

  //     $data = Download::dataReport($docente_id);
  //     $data['type'] = 'Screen';

  //     return view('app.schedule.report')
  //         ->with('data',$data);  
  //   }else{
  //     return redirect('/home');
  //   }
  // }

  // public function reportPdf($docente_id)
  // {
  //   $data = Download::dataReport($docente_id);
  //   $data['type'] = 'PDF';

  //   try{
  //     $pdf = PDF::loadView('app.schedule.report', compact('data'))
  //               ->setPaper('a4')
  //               ->setOption('margin-top', 25)
  //               ->setOrientation('Portrait');
  //     return $pdf->stream('reporte.pdf');      
  //   } catch (Exception $e) {
  //     dd('Error reportPdf', $e);
  //   }
  // }

  // public function reportDownload_pc($docente_id){
  //   return $this->reportDownload($docente_id, 'pc');
  // }

  // public function reportDownload_storage($docente_id){
  //   return $this->reportDownload($docente_id, 'storage');
  // }

  // private function reportDownload($docente_id, $output)
  // {
  //   $data = $this->dataReport($docente_id);
  //   $data['type'] = 'PDF';
  //   $user = User::findOrFail($docente_id);
  //   $file_to_attach = storage_path() . '/reports/report_' . $user->cdocente . '.pdf';
  //   $file_name = 'report_' . $user->wdocente . '.pdf';    
  //   try{
  //     if($output == 'pc'){
  //       PDF::loadView('app.schedule.report', compact('data'))
  //                 ->setPaper('a4')
  //                 ->setOption('margin-top', 25)
  //                 ->setOrientation('Portrait')
  //                 ->download($file_name);
  //     }else{
  //       // Borrar archivo anterior
  //       if(file_exists($file_to_attach)){
  //         unlink($file_to_attach);
  //       }

  //       PDF::loadView('app.schedule.report', compact('data'))
  //                 ->setPaper('a4')
  //                 ->setOption('margin-top', 25)
  //                 ->setOrientation('Portrait')
  //                 ->save($file_to_attach);
  //     }
  //   } catch (Exception $e) {
  //     return ['success'=>'false', 'error' => $e];
  //   }    

  //   if(file_exists($file_to_attach)){
  //     if($output == 'pc'){      
  //       flash('Archivo: report_' . $cdocente . '.pdf generado.')->success();
  //       return redirect(route('app.schedule.index'));
  //     }else{
  //       // Crear archivo reporte (TODO: ejecutar una funcion de otro controlador)
  //       flash('Archivo: report_' . $file_to_attach . '.pdf generado.')->success();
  //       return redirect(route('app.schedule.index'));
  //       // return ['success' => true, 'file_to_attach' => $file_to_attach, 'file_name' => $file_name];
  //     }
  //   }
  // }


  // public function cronoDownload_pc($docente_id){
  //   return $this->cronoDownload($docente_id, 'pc');
  // }

  // public function cronoDownload_storage($docente_id){
  //   return $this->cronoDownload($docente_id, 'storage');
  // }

  // private function cronoDownload($docente_id, $output)
  // {
  //   $data = $this->dataCrono($docente_id);
  //   $data['type'] = 'PDF';
  //   $user = User::findOrFail($docente_id);
  //   $file_to_attach = storage_path() . '/reports/crono_' . $user->cdocente . '.pdf';
  //   $file_name = 'crono_' . $user->wdocente . '.pdf';    
  //   try{
  //     if($output == 'pc'){
  //       PDF::loadView('app.schedule.crono', compact('data'))
  //                 ->setPaper('a4')
  //                 ->setOption('margin-top', 25)
  //                 ->setOrientation('Portrait')
  //                 ->download($file_name);
  //     }else{
  //       // Borrar archivo anterior
  //       if(file_exists($file_to_attach)){
  //         unlink($file_to_attach);
  //       }

  //       PDF::loadView('app.schedule.crono', compact('data'))
  //                 ->setPaper('a4')
  //                 ->setOption('margin-top', 25)
  //                 ->setOrientation('Portrait')
  //                 ->save($file_to_attach);
  //     }
  //   } catch (Exception $e) {
  //     return ['success'=>'false', 'error' => $e];
  //   }    

  //   if(file_exists($file_to_attach)){
  //     if($output == 'pc'){      
  //       flash('Archivo: crono_' . $cdocente . '.pdf generado.')->success();
  //       return redirect(route('app.schedule.index'));
  //     }else{
  //       // Crear archivo reporte (TODO: ejecutar una funcion de otro controlador)
  //       flash('Archivo: crono_' . $file_to_attach . '.pdf generado.')->success();
  //       return redirect(route('app.schedule.index'));
  //       // return ['success' => true, 'file_to_attach' => $file_to_attach, 'file_name' => $file_name];
  //     }
  //   }
  // }
  
  // public function cronoPdf($docente_id)
  // {
  //   $data = Download::dataCrono($docente_id);
  //   $data['type'] = 'PDF';
  //   try {
  //     $pdf = PDF::loadView('app.schedule.crono', compact('data'))
  //               ->setPaper('a4')
  //               ->setOrientation('Portrait');
  //     return $pdf->stream('cronograma.pdf');      
  //   } catch (Exception $e) {
  //     dd('Error cronoPdf', $e);
  //   }
  // }

  // public function cronoShow($docente_id)
  // {
  //   if(\Auth::user()->isAdmin 
  //     || \Auth::user()->isMaster
  //     || \Auth::user()->id == $docente_id){

  //     $showData = Download::dataCrono($docente_id);

  //     $showData['type'] = 'Screen';

  //     return view('app.schedule.crono')
  //         ->with('data',$showData);  
  //   }else{
  //     return redirect('/home');
  //   }
  // }

  // public function dataCrono($docente_id)
  // {
  //   $data = $this->data($docente_id);

  //   $docente = $data['docente'];
  //   $cdocente = $docente['cdocente'];
  //   $wdocente = $docente['wdocente'];

  //   // Define fini y ffin segun los periodos vigentes
  //   $periodos = $data['periodos'];
  //   $fini = date("Y-m-d");    // Desde hoy
  //   // $ffin = date('Y-m-d', strtotime('1900-1-1'));
  //   $ffin = $fini;
  //   foreach ($periodos as $periodo) {
  //     if( date('Y-m-d', strtotime($periodo['fecha_fin']))>$ffin){
  //       $ffin = $periodo['fecha_fin'];
  //     }
  //   }
  //   // Crea el calendario desde fini a ffin
  //   $fecha = Carbon::parse($fini);
  //   $ffin = Carbon::parse($ffin);
  //   $rango = $fecha->diffInDays($ffin)+1;
  //   $calendar = [];
  //   for ($d=0; $d < $rango; $d++) {
  //     if ( date('w', strtotime($fecha))==0 ){
  //       $status = 'domingo';
  //     }else{
  //       $status = 'habil';
  //     }
  //     $item =  [
  //       'id' => $d,
  //       'semana' => 0,
  //       'ndia' => date('w', strtotime($fecha)),
  //       'fecha' => $fecha->format("Y-m-d"),
  //       'status' => $status,
  //       'color' => ''
  //     ];
  //     array_push($calendar, $item);
  //     $fecha->addDay(1);
  //   }
  //   // Agrega los feriados
  //   $feriados = $data['feriados'];
  //   foreach ($feriados as $feriado) {
  //     $fecha = $feriado['fecha'];
  //     foreach ($calendar as $dia) {
  //       if($dia['fecha'] == $fecha){
  //         $calendar[$dia['id']]['status'] = 'feriado';
  //       }
  //     }
  //   }
  //   // Agrega las vacaciones gozadas
  //   $gozadas = $data['gozadas'];
  //   foreach ($gozadas as $rango) {
  //     $fecha = Carbon::parse($rango['fecha_ini']);
  //     $fecha_fin = Carbon::parse($rango['fecha_fin']);
  //     $rango = $fecha->diffInDays($fecha_fin)+1;
  //     for ($d=0; $d < $rango; $d++) {
  //       foreach ($calendar as $dia) {
  //         if( Carbon::parse($dia['fecha']) == $fecha){
  //           $calendar[$dia['id']]['status'] = 'gozadas';
  //         }
  //       }
  //       $fecha->addDay(1);
  //     }
  //   }
  //   // Agrega las vacaciones programadas
  //   $programadas = $data['programadas'];
  //   foreach ($programadas as $rango) {
  //     $fecha = Carbon::parse($rango['fecha_ini']);
  //     $fecha_fin = Carbon::parse($rango['fecha_fin']);
  //     $rango = $fecha->diffInDays($fecha_fin)+1;
  //     for ($d=0; $d < $rango; $d++) {
  //       foreach ($calendar as $dia) {
  //         if( Carbon::parse($dia['fecha']) == $fecha){
  //           $today = Carbon::today()->endOfDay();
  //           if($fecha < $today){
  //             $calendar[$dia['id']]['status'] = 'gozadas';
  //           }else{
  //             $calendar[$dia['id']]['status'] = 'vacaciones';
  //           }
  //         }
  //       }
  //       $fecha->addDay(1);
  //     }
  //   }

  //   // Agrega los horarios (dia, noche, vacaciones)
  //   $semestres = $data['semestres'];
  //   // $semestres = Semestre::where('status', true)->get();
  //   $horarios = $data['horarios'];
  //   // $horarios = Horario::where('cdocente', $cdocente)->get();
  //   foreach ($horarios as $horario) {
  //     $semana = ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
  //     $weekDay = array_search($horario['dia'], $semana);
  //       foreach ($semestres as $semestre) {
  //         if( $semestre['semestre'] == $horario['semestre'] ){
  //           $fecha = Carbon::parse($semestre['fecha_ini']);
  //           $fecha_fin = Carbon::parse($semestre['fecha_fin']);
  //           $rango = $fecha->diffInDays($fecha_fin)+1;
  //           for ( $d=0; $d < $rango; $d++ ) {
  //             if ( date('w', strtotime($fecha)) == $weekDay ){
  //               foreach ($calendar as $dia) {
  //                 if( Carbon::parse($dia['fecha']) == $fecha && $calendar[$dia['id']]['status'] == 'habil' ){
  //                   // $calendar[$dia['id']]['status'] = 'vacaciones';
  //                   $calendar[$dia['id']]['status'] = $horario['turno'];
  //                 }
  //               }
  //             }
  //             $fecha->addDay(1);
  //           }
  //         }
  //       }
  //   }
  //   // // Filtra desde hoy()
  //   // Genera el calendario semana x semana
  //   $key_first = array_keys($calendar)[0];
  //   $fechas = [];
  //   $dia = date('w', strtotime($calendar[$key_first]['fecha']));
  //   for ($i=0; $i < $dia; $i++) { 
  //     $item =  [
  //       'id' => -1,
  //       'semana' => 1,
  //       'fecha' => '',
  //       'ndia' => $i,
  //       'status' => 'blanco',
  //       'color' => ''
  //     ];
  //     array_push($fechas, $item);
  //   }
  //   foreach ($calendar as $fecha) {
  //     array_push($fechas, $fecha);
  //   }
  //   $calendario = [];
  //   $semana = [];
  //   for ($i=0; $i < count($fechas); $i++) { 
  //     $fechas[$i]['semana'] = intdiv($i, 7);
  //   }
  //   for ($n=0; $n < intdiv(count($fechas), 7); $n++) {
  //     $semana = array_filter($fechas, function ($fecha) use($n)
  //     {
  //       return $fecha['semana'] == $n;
  //     });
  //     // Define mes
  //     $meses = ['Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'];

  //     foreach ($semana as $dia) {
  //       if ($dia['fecha'] != ''){
  //         $mes = date('n', strtotime($dia['fecha']));
  //         $anho = date('Y', strtotime($dia['fecha']));
  //       }
  //     }
  //     array_push($calendario, ['mes'=> $meses[$mes-1].' '.$anho, 'semana'=>$semana]);
  //   }
  //   $parameters = [
  //     'width' => 50,
  //     'height' =>25
  //   ];

  //   return [
  //     'docente' => $docente,
  //     'data' => $calendario,
  //     'param' => $parameters,
  //   ];
  // }    

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

        // if($item['turno'] == 'none'){
        //     // elimina
        //   $registro->delete();
        // }else{
        //     // modifica
        //   $registro->turno = $item['turno'];
        //   $registro->save();            
        // }
      }else{
            // crea nuevo registro
          $new = Horario::create([
            'cdocente' => $cdocente,
            'semestre' => $item['semestre'],
            'dia' => $item['dia'],
            'turno' => $item['turno']
          ]);
        // if($item['turno'] != 'none'){
        //     // crea nuevo registro
        //   $new = Horario::create([
        //     'cdocente' => $cdocente,
        //     'semestre' => $item['semestre'],
        //     'dia' => $item['dia'],
        //     'turno' => $item['turno']
        //   ]);
        // }
      }
    } 
    return ['success' => true];
  }
  public function savePeriodos(Request $request)
  {
    $cdocente = $request->cdocente;
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
    // dd('api/ScheduleController', $horarios);
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
      'semestre' => $semestre1
    ];
  }
}
