<?php

namespace App\Http\Controllers;

use App\Ganada;
use App\Periodo;
use App\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function edit($docente_id)
    {
    	return view('app.schedule.edit')
    		->with('docente_id', $docente_id);
    }

    public function index()
    {
        // $users = User::all()->sortBy('name');
        // return $users->toJson();
        return view('app.schedule.index');
        // ->with('data', $users);
    }

}
