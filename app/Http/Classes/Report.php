<?php

namespace App\Http\Classes;

// use App\Horario;
use App\Http\Classes\Download;
// use App\Periodo;
// use App\Programada;
// use App\Semestre;
// use App\User;
// use PDF;

class Report
{
  public $docente_id;

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

  public static function reportDownload_pc($docente_id)
  {
    return Download::reportDownload($docente_id, 'pc');
  }

  public static function reportDownload_storage($doc_id)
  {
    return Download::reportDownload($doc_id, 'storage');
  }
  public static function cronoDownload_pc($docente_id)
  {
    return Download::cronoDownload($docente_id, 'pc');
  }

  public static function cronoDownload_storage($docente_id)
  {
    return Download::cronoDownload($docente_id, 'storage');
  }

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

}
