<?php

namespace App\Http\Controllers;

use App\Email;
use App\Ganada;
use App\Http\Classes\Download;
use App\Http\Classes\Report;
use App\Periodo;
use App\Tmail;
use App\User;
use Barryvdh\Snappy\PdfWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use PDF;

class ScheduleController extends Controller
{
  public function confirmView($tmail_id, $docente_id)
  {
    $user = User::findOrFail($docente_id);
    $tmail = Tmail::findOrFail($tmail_id);

    $reply = Report::saveReply($docente_id);

    $report = Report::reportDownload_storage($docente_id);
    $file_to_attach1 = $report['file_to_attach']; 
    //storage_path() . '/reports/report_' . $user->cdocente . '.pdf';
    $file_name1 = $report['file_name'];
    //'report_' . $user->name;
    $crono = Report::cronoDownload_storage($docente_id);
    $file_to_attach2 = $crono['file_to_attach'];
    //storage_path() . '/reports/crono_' . $user->cdocente . '.pdf';
    $file_name2 = $crono['file_name'];
    // $user->name;
    if($reply['success']){
      Email::create([
            'tmail_id' => $tmail->id,
            'from' => env('MAIL_USERNAME'),
            'to' => $user->email,
            'user_id_to' => $user->id,
            'cc1' => 'jfigueroa@ucss.edu.pe',
            'view' => 'app.mail.reply',
            'limit_date' => $tmail->limit_date,
            'file_to_attach1' => $file_to_attach1,
            'file_name1' => $file_name1,
            'file_to_attach2' => $file_to_attach2,
            'file_name2' => $file_name2,
        ]);  

      $data = [
        'tmail_id' => $tmail_id,
        'user' => $user,
        'file_pdf' => asset('view/reply_'.$user->cdocente.'.pdf')
      ];

      return view('app.schedule.confirm')->with('data', $data);

    }else{
      flash('Error al generar correo de confirmación.')->danger();
      return back();
    }
  }

  public function edit($docente_id)
  {
    if(\Auth::user()->isAdmin || \Auth::user()->isMaster || \Auth::user()->id == $docente_id){
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
      $file_name = $data['docente']['cdocente'].'.pdf';
      $file_to_save = storage_path('reports/crono_'.$file_name);
      
      $pdf = App::make('snappy.pdf.wrapper');

      return $pdf->loadView('app.schedule.crono', compact('data'))->stream($file_name);
    } catch (Exception $e) {
      dd('Error cronoPdf', $e);
    }
  }

  public function cronoShow($docente_id)
  {
    if(\Auth::user()->isAdmin || \Auth::user()->isMaster || \Auth::user()->id == $docente_id){
      $showData = Download::dataCrono($docente_id);

      $showData['type'] = 'Screen';

      return view('app.schedule.crono')
      ->with('data',$showData);  
    }else{
      return redirect('/home');
    }
  }
}
