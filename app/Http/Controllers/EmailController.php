<?php

namespace App\Http\Controllers;

use App\Email;
use App\Tmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send_notification($email_id)
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

        // \Mail::send($email->view, $data, function ($message) use($data, $attach) {

        //     $message->from($data['from'], $data['dfrom']);

        //     $message->to($data['to']);

        //     $message->subject($data['subject']);
        //     if(!empty($data['attach'])){
        //         $message->AddAttachment( $attach['file_to_attach'], $attach['name_file']);
        //     }

        // });


    }   // end of send_notification()


    public function index($tmail_id)
    {
        $tmail = Tmail::findOrFail($tmail_id);
        $docs = [];
        $users = User::all();
        foreach ($users as $item) {
            if($item->isDoc){
                array_push($docs, $item);
            }
        }

        return view('app.mail.email.index')
            ->with('data', ['users'=>$docs, 'tmail'=> $tmail]);
    }

    public function store(Request $request)
    {
        $users = [];
        foreach ($request->chk as $key => $value) {
            $user = User::findOrFail($key);
            array_push($users, $user);
        }
        try {
            foreach ($users as $user) {
                $email = new Email;
                $email->tmail_id = $request->tmail->id ;
                $email->from = env('MAIL_USERNAME');
                $email->user_id_to = $user->id ;
                $email->to = $user->email ;
                $email->view = $request->tmail->view ;
                $email->limit_date = $request->tmail->limit_date;
                // $email->limit_date = $request->tmail->limit_date->format('Y-m-d H:i:s');
// dd($email);
                $email->save();
            }
            return redirect('app.mail.tmail.index');
        } catch (Exception $e) {
            dd('error EmailController@store', e);
        }
    }

    // public function show(Email $email)
    // {
    //     //
    // }

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
