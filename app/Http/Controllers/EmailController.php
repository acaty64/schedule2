<?php

namespace App\Http\Controllers;

use App\Email;
use App\Tmail;
use App\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index($tmail_id)
    {
// dd($tmail_id);
        $tmail = Tmail::findOrFail($tmail_id);
        $docs = [];
        $users = User::all();
        foreach ($users as $item) {
            if($item->isDoc){
                array_push($docs, $item);
            }
        }

        //where('isDoc')->orderBy('name')->paginate(15);
        return view('app.mail.email.index')
            ->with('data', ['users'=>$docs, 'tmail'=> $tmail]);
    }

    public function store(Request $request)
    {
// dd($request->chk;
        $users = [];
        foreach ($request->chk as $key => $value) {
            $user = User::findOrFail($key);
            array_push($users, $user);
        }
//         $users = $request->users;
        try {
            foreach ($users as $user) {
                $email = new Email;
                $email->tmail_id = $request->tmail->id ;
                $email->from = 'ucss.fcec.lim@gmail.com';
                $email->to = $user->email ;
                $email->view = $request->tmail->view ;
                $email->limit_date = $request->tmail->limit_date ;
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
