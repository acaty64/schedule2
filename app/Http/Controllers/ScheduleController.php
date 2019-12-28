<?php

namespace App\Http\Controllers;

use App\Ganada;
use App\Http\Classes\Download;
use App\Periodo;
use App\User;
use PDF;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // public function show($docente_id)
    // {
    //     $data = Api\ScheduleController::dataShow($docente_id);
    //     return view('app.schedule.show')->with('data', $data);
    // }
    
    public function edit($docente_id)
    {
        if(\Auth::user()->isAdmin 
            || \Auth::user()->isMaster 
            || \Auth::user()->id == $docente_id){
            	return view('app.schedule.edit')
            		->with('docente_id', $docente_id);
        }else{
            return redirect('/home');
        }
    }

    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        // return $users->toJson();
        return view('app.schedule.index')
            ->with('data', $users);
    }

  public function reportShow($docente_id)
  {
    if(\Auth::user()->isAdmin 
      || \Auth::user()->isMaster
      || \Auth::user()->id == $docente_id)
    {
      $data = Download::dataReport($docente_id);
      $data['type'] = 'Screen';

      return view('app.schedule.report')
          ->with('data',$data);  
    }else{
      return redirect('/home');
    }
  }

  public function reportPdf($docente_id)
  {
    $data = Download::dataReport($docente_id);
    $data['type'] = 'PDF';
    try
    {
      $pdf = PDF::loadView('app.schedule.report', compact('data'))
                ->setPaper('a4')
                ->setOption('margin-top', 25)
                ->setOrientation('Portrait');
      return $pdf->stream('reporte.pdf');      
    } catch (Exception $e) {
      dd('Error reportPdf', $e);
    }
  }

  public function cronoPdf($docente_id)
  {
    $data = Download::dataCrono($docente_id);
    $data['type'] = 'PDF';
    try {
      $pdf = PDF::loadView('app.schedule.crono', compact('data'))
                ->setPaper('a4')
                ->setOrientation('Portrait');
      return $pdf->stream('cronograma.pdf');      
    } catch (Exception $e) {
      dd('Error cronoPdf', $e);
    }
  }

  public function cronoShow($docente_id)
  {
    if(\Auth::user()->isAdmin 
      || \Auth::user()->isMaster
      || \Auth::user()->id == $docente_id){

      $showData = Download::dataCrono($docente_id);

      $showData['type'] = 'Screen';

      return view('app.schedule.crono')
          ->with('data',$showData);  
    }else{
      return redirect('/home');
    }
  }
}
