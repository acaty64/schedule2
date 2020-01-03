<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Classes\Report;
use App\Http\Classes\Download;
use App\Tmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send_reply($tmail_id, $docente_id)
    {
        $email = Email::where('tmail_id', $tmail_id)
        ->where('user_id_to', $docente_id)
        ->first();
        $user = User::findOrFail($docente_id);
        if(!is_null($email)){

            $data = [
                'from' => $email->from,
                'dfrom' => 'Departamento Académico FCEC',
                'to' => $email->to,
                'user_id_to' => $email->to,
                'subject' => 'Confirmación de cronograma.',
                'wdocente' => $user->wdocente,
                'view' => 'app.mail.email.reply',
            ];

            $attach = [
                ['file_to_attach' => $email->file_to_attach1, 'file_name' => $email->file_name1 ],
                ['file_to_attach' => $email->file_to_attach2, 'file_name' => $email->file_name2 ]
            ];

            try {
                Mail::send($data['view'], ['data'=>$data], function ($message) use ($data, $attach) {
                    $message->to($data['to'], '');
                    $message->from('ucss.fcec.lim@gmail.com', 'UCSS – FCEC');
                    $message->subject($data['subject']);
                    foreach ($attach as $item) {
                        $message->attach( $item['file_to_attach'], 
                            [ 'as'=>$item['file_name'], 'mime' => 'application/pdf']);
                    }
                });         

                $email->reply_date = now();
                $email->save();

                flash('Correo electrónico de confirmación enviado.')->success();
                return view('thanks');

            } catch (Exception $e) {
                flash('Error al enviar el correo electrónico.')->error();
                return redirect(route('schedule.confirm.view', ['tmail_id'=>$tmail->id, 'docente_id'=>$user->id]));
            }
        }

    }

    public function send_notification($tmail_id)
    {
        $emails = Email::where('tmail_id', $tmail_id)
        ->whereNull('send_date')
        ->get();
        $count = 0;
        foreach ($emails as $item) {
            $chk_send = $this->send_email_notification($item->id);

            if($chk_send['success'] == false){
                flash($chk_send['message'])->error();
                return redirect(route('app.email.show',$tmail_id));
            }
            $count++;
        }
        flash($count . ' correos enviados')->success();
        return redirect(route('app.email.show', $tmail_id));
        // return ['success'=>true];
    }

    public function send_email_notification($email_id)
    {
        $email = Email::findOrFail($email_id);

        $toUser = User::where('email', $email->to)->first();
        $wdocente = $toUser->wdocente;
        $cdocente = $toUser->cdocente;

        $data = [
            'from' => $email->from,
            'dfrom' => 'Departamento Académico FCEC',
            'to' => $email->to,
            'user_id_to' => $email->to,
            'subject' => $email->subject,
            'wdocente' => $wdocente,
            'limite' => $email->limit_date,
            'view' => $email->view,
        ];

        $attach = [
            ['file_to_attach' => $email->file_to_attach1, 'file_name' => $email->file_name1 ],
            ['file_to_attach' => $email->file_to_attach2, 'file_name' => $email->file_name2 ]
        ];

        try {
            Mail::send($data['view'], ['data'=>$data], function ($message) use ($data, $attach) {        
                $message->to($data['to'], '');
                $message->from('ucss.fcec.lim@gmail.com', 'UCSS – FCEC');
                $message->subject($data['subject']);
                foreach ($attach as $item) {
                    $message->attach( $item['file_to_attach'], 
                        [ 'as'=>$item['file_name'], 'mime' => 'application/pdf']);
                }
            });         

            $email->send_date = now();
            $email->save();

        } catch (Exception $e) {
            return ['success'=>false, 'message' => 'Error al enviar el correo electrónico.'];
        }
        return ['success'=>true];

    }   // end of send_notification()


    public function index($tmail_id)
    {
        $tmail = Tmail::findOrFail($tmail_id);
        $emails = Email::where('tmail_id', $tmail_id)->get();
        $docs = [];
        $users = User::all();
        foreach ($users as $item) {
            // array_push($item, ['chk' => 'off', 'sended' => 'off' ]);
            if($item->isDoc){
                $item->setAttribute('chk', 'off');
                $item->setAttribute('sended', 'off');
                $item->setAttribute('reply', 'off');
                array_push($docs, $item);
            }
        }
        foreach ($emails as $chk) {
            foreach ($docs as $key => $value) {
                if($docs[$key]['id'] == $chk['user_id_to']){
                    $docs[$key]['chk'] = 'on';
                }
            }
        }
        $sended = $emails->where('send_date','<>', '');
        foreach ($sended as $chk) {
            foreach ($docs as $key => $value) {
                if($docs[$key]['id'] == $chk['user_id_to']){
                    $docs[$key]['sended'] = 'on';
                }
            }
        }
        $reply = $emails->where('reply_date','<>', '');
        foreach ($reply as $chk) {
            foreach ($docs as $key => $value) {
                if($docs[$key]['id'] == $chk['user_id_to']){
                    $docs[$key]['replay'] = 'on';
                }
            }
        }
        //// Sort by name

        return view('app.mail.email.index')
        ->with('data', ['users'=>$docs, 'tmail'=> $tmail]);
    }

    public function store(Request $request)
    {
        $tmail = Tmail::findOrFail($request->tmail_id);
        if(is_null($request->chk)){
            flash('No se ha seleccionado nuevos envíos de correo.')->error();
            return redirect(route('app.email.index', $tmail->id));
        }else{
            $users = [];

            foreach ($request->chk as $key => $value) {
                $user = User::findOrFail($key);
                array_push($users, $user);
            }
            try {
                $olds = Email::where('tmail_id', $tmail->id)
                ->whereNull('send_date')->get();
                foreach ($olds as $old) {
                    if(!array_key_exists($old->user_id_to, $request->chk)){
                        $old->delete();
                    }
                }
                foreach ($users as $user) {
                    $old = Email::where('tmail_id', $tmail->id)
                    ->where('to', $user->email)->get();
                    if($old->count() == 0){
                        $responseR = Report::reportDownload_storage($user->id);
                        $responseC = Report::cronoDownload_storage($user->id);
                        if($responseR['success'] && $responseC['success']){
                            $email = new Email;
                            $email->tmail_id = $tmail->id ;
                            $email->from = env('MAIL_USERNAME');
                            $email->user_id_to = $user->id ;
                            $email->to = $user->email ;
                            $email->view = $tmail->view ;
                            $email->limit_date = $tmail->limit_date;
                            $email->file_to_attach1 = $responseR['file_to_attach'];
                            $email->file_name1 = $responseR['file_name'];
                            $email->file_to_attach2 = $responseC['file_to_attach'];
                            $email->file_name2 = $responseC['file_name'];
                            $email->save();
                        } else {
                            flash('Error al generar PDF: '.$user->name)->error();
                            return redirect(route('app.email.index', $tmail->id));
                            break;
                        }
                    }
                }
                return redirect(route('app.email.show', $tmail->id));
            } catch (Exception $e) {
                dd('error EmailController@store', e);
            }

        }
    }

    public function show($tmail_id)
    {
        $tmail = Tmail::findOrFail($tmail_id);
        $docs = [];
        $emails = Email::where('tmail_id', $tmail->id)->get();
        foreach ($emails as $item) {
            $user = User::findOrFail($item->user_id_to);
            $user->setAttribute('send_date', $item->send_date);
            $user->setAttribute('reply_date', $item->reply_date);
            array_push($docs, $user);
        }
        $chk_send = [];
        $chk_send = array_filter($docs, function($i)
        {
            return ( $i['send_date'] == null ) ? true : false;
        });

        usort($docs, function ($item1, $item2) {
            return $item1['name'] <=> $item2['name'];
        });

        return view('app.mail.email.show')
        ->with('data', ['users'=>$docs, 'tmail'=> $tmail, 'chk_send' => count($chk_send)]);
    }

    public function edit($id)
    {
        $email = Email::findOrFail($id);
        return view('app.mail.email.edit')->with('data', $email);
    }

    public function update(Request $request)
    {
        $item = Email::findOrFail($request->id);
        try {
            $item->name = $request->name;
            $item->subject = $request->subject;
            $item->view = $request->view;
            $item->limit_date = $request->limit_date->setTime(23,59,59);
            $item->limit_date->format('Y-m-d H:i:s');
            $item->save();
            return redirect('app.mail.email.index');
        } catch (Exception $e) {
            dd('error EmailController@update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Email::findOrFail($id);
        try {
            $item->delete();
            return redirect('app.mail.email.index');
        } catch (Exception $e) {
            dd('error EmailController@destroy');
        }

    }
}
