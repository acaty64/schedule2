<?php

namespace App\Http\Controllers\Admin;

use App\Feriado;
use App\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $year = $data['year'];
        $fecha1 = mktime(0, 0, 0, 1, 31, $year-1);
        $fecha2 = mktime(0, 0, 0, 1, 1, $year+1);
        $check = Feriado::where('fecha','>',$fecha1)->where('fecha','<',$fecha2)->get();
        if($check){
            return 'Error, ya existen feriados del año ' . $year;
        }
        $holidays = Holiday::all();
        foreach ($holidays as $holiday) {
            $fecha = mktime(0, 0, 0, $holiday['mm'], $holiday['dd'], $year);
            Feriado::create([
                'fecha' => date('Y-m-d', $fecha),
                'wferiado' => $holiday['wferiado'],
            ]);

        }
        return ['success' => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
