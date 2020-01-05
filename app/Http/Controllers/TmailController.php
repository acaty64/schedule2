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
        switch (gettype($request->limit_date)) {
            case 'string':
                $limit = date('Y-m-d H:i:s', strtotime($request->limit_date));
                break;
            case 'number':
                $limit = date("Y-m-d H:i:s", $request->limit_date);
                break;
            default:
                $limit = $request->limit_date;
                break;
        }
        $limit = date_create_from_format('Y-m-d H:i:s', $limit)->setTime(23,59,59);
        $limit = $limit->format('Y-m-d H:i:s');
        try {
            $tmail = new Tmail;
            $tmail->name = $request->name;
            $tmail->subject = $request->subject;
            $tmail->view = $request->view;
            $tmail->limit_date = $limit;
            $tmail->save();
            flash('Registro ' . $tmail->id . ' creado.')->success();
            return redirect(route('app.tmail.index'));
        } catch (Exception $e) {
            dd('error TmailController@store', e);
        }
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
        switch (gettype($request->limit_date)) {
            case 'string':
                $limit = date('Y-m-d H:i:s', strtotime($request->limit_date));
                break;
            case 'number':
                $limit = date("Y-m-d H:i:s", $request->limit_date);
                break;
            default:
                $limit = $request->limit_date;
                break;
        }
        $limit = date_create_from_format('Y-m-d H:i:s', $limit)->setTime(23,59,59);
        $limit = $limit->format('Y-m-d H:i:s');
        try {
            $item->name = $request->name;
            $item->subject = $request->subject;
            $item->view = $request->view;
            $item->limit_date = $limit;
            $item->save();
            flash('Registro ' . $item->id . ' modificado.')->success();
            return redirect(route('app.tmail.index'));
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
            flash('Registro ' . $item->id . ' eliminado.')->success();
            return redirect(route('app.tmail.index'));
        } catch (Exception $e) {
            dd('error TmailController@destroy');
        }

    }
}
