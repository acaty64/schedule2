<?php

namespace App\Http\Classes;

use App\Http\Classes\Download;
use App\User;
use PDF;

class Report
{
  public $docente_id;

  public static function saveReply($docente_id)
  {
    $user = User::findOrFail($docente_id);
    $file_to_save = public_path() . DIRECTORY_SEPARATOR . 'view' .  DIRECTORY_SEPARATOR . 'reply_' . $user->cdocente . '.pdf';
    $file_name = 'reply_' . $user->wdocente . '.pdf';    

    if(file_exists($file_to_save)){
      unlink($file_to_save);
    }

    $data = ['wdocente' => $user->wdocente];
    $vista = 'app.mail.email.reply';
    try {
      $pdf = PDF::loadView($vista, compact('data'))
                    ->setPaper('a4')
                    ->setOption('margin-top', 25)
                    ->setOrientation('Portrait');
      $pdf->save($file_to_save);
      return ['success' => true, 'file_to_save' => $file_to_save, 'file_name' => $file_name];
    } catch (Exception $e) {
      return ['success'=>'false', 'error' => $e];
    }  
  }

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

}
