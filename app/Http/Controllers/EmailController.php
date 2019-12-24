<?php

namespace App\Http\Controllers;

use App\Email;
use App\Tmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send_notification($tmail_id)
    {
        $emails = Email::where('tmail_id', $tmail_id)->get();
        foreach ($emails as $item) {
            $this->send_email_notification($item->id);
        }
    }

    public function send_email_notification($email_id)
    {
        $email = Email::findOrFail($email_id);

        $toUser = User::where('email', $email->to)->first();
        $wdocente = $toUser->wdocente;
        $cdocente = $toUser->cdocente;

        // Crear archivo reporte

        $file_to_attach = public_path() . '/reports/report_' . $cdocente . '.pdf';

        $file_name = $wdocente . '.pdf';

            // PDF::loadHTML($html)->save(public_path().'/vacaciones/'.$file_out); 



        $data = [
            'from' => $email->from,
            'dfrom' => 'Departamento Académico FCEC',
            'to' => $email->to,
            'user_id_to' => $email->to,
            'subject' => $email->subject,
            'wdocente' => $wdocente,
            'limite' => $email->limit_date,
            'view' => $email->view,
            // 'limite' => $email->limit_date->format('Y-m-d H:i:s'),
        ];

        $attach = [
            'file_to_attach' => $file_to_attach,            
            'file_name' => $file_name,            
        ];

$attach = [];
// Api\EmailController::send($data, $attach);
try {
    Mail::send($data['view'], ['data'=>$data], function ($message) use ($data) {        
        $message -> to($data['to'], '')
            ->from('ucss.fcec.lim@gmail.com', 'UCSS – FCEC')
            ->subject($data['subject']);
    });         

    $email->send_date = now();
    $email->save();

    return response()->json(['success' => true ]);
} catch (Exception $e) {
    dd('error', $e);
}


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
// dd($docs);
        return view('app.mail.email.index')
            ->with('data', ['users'=>$docs, 'tmail'=> $tmail]);
    }

    public function store(Request $request)
    {
        $tmail = Tmail::findOrFail($request->tmail_id);
        $users = [];
        foreach ($request->chk as $key => $value) {
            $user = User::findOrFail($key);
            array_push($users, $user);
        }
        try {
            foreach ($users as $user) {
                $old = Email::where('tmail_id', $tmail->id)
                        ->where('to', $user->email)->get();
                if($old->count() == 0){
                    $email = new Email;
                    $email->tmail_id = $tmail->id ;
                    $email->from = env('MAIL_USERNAME');
                    $email->user_id_to = $user->id ;
                    $email->to = $user->email ;
                    $email->view = $tmail->view ;
                    $email->limit_date = $tmail->limit_date;
                    $email->save();
                }
            }
            return redirect(route('app.email.show', $tmail->id));
        } catch (Exception $e) {
            dd('error EmailController@store', e);
        }
    }

    public function show($tmail_id)
    {
        $tmail = Tmail::findOrFail($tmail_id);
        $docs = [];
        $emails = Email::where('tmail_id', $tmail->id)->get();
        foreach ($emails as $item) {
            $user = User::findOrFail($item->user_id_to);
            array_push($docs, $user);
        }
        return view('app.mail.email.show')
            ->with('data', ['users'=>$docs, 'tmail'=> $tmail]);
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
