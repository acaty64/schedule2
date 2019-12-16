<?php

namespace App\Http\Controllers;

use App\Ganada;
use App\Periodo;
use App\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function show($docente_id)
    {
        $data = Api\ScheduleController::dataShow($docente_id);
        return view('app.schedule.show')->with('data', $data);
    }
    public function edit($docente_id)
    {
    	return view('app.schedule.edit')
    		->with('docente_id', $docente_id);
    }

    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        // return $users->toJson();
        return view('app.schedule.index')
            ->with('data', $users);
    }

}
