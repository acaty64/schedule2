<?php

namespace App\Http\Controllers;

use App\Tmail;
use Illuminate\Http\Request;

class TmailController extends Controller
{
    public function index()
    {
        $tmails = Tmail::orderByDesc('id')->paginate(15);
        return view('app.mail.tmail.index')
            ->with('data', $tmails);        
    }

    public function create()
    {
        return view('app.mail.tmail.create');
    }

    public function store(Request $request)
    {
        // try {
            $tmail = new Tmail;
            $tmail->name = $request->name;
            $tmail->subject = $request->subject;
            $tmail->view = $request->view;
            $date = $request->limit_date->setTime(23,59,59);
            $tmail->limit_date = $date->format('Y-m-d H:i:s');
            $tmail->save();
            return redirect('app.mail.tmail.index');
// dd($tmail);
        // } catch (Exception $e) {
        //     dd('error TmailController@store', e);
        // }
    }

    public function show(Tmail $tmail)
    {
        //
    }

    public function edit($id)
    {
        $tmail = Tmail::findOrFail($id);
        return view('app.mail.tmail.edit')->with('data', $tmail);
    }

    public function update(Request $request)
    {
        $item = Tmail::findOrFail($request->id);
        try {
            $item->name = $request->name;
            $item->subject = $request->subject;
            $item->view = $request->view;
            $item->limit_date = $request->limit_date->setTime(23,59,59);
            $item->limit_date->format('Y-m-d H:i:s');
            $item->save();
            return redirect('app.mail.tmail.index');
        } catch (Exception $e) {
            dd('error TmailController@update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tmail  $tmail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tmail::findOrFail($id);
        try {
            $item->delete();
            return redirect('app.mail.tmail.index');
        } catch (Exception $e) {
            dd('error TmailController@destroy');
        }

    }
}
