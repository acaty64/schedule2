<?php

namespace App\Http\Controllers;

use App\Periodo;
use App\User;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($docente_id)
    {
      $docente = User::findOrFail($docente_id);
      $periodos = Periodo::where('cdocente', $docente->cdocente)->get();
      return view('app.periodos.index')
          ->with('periodos', $periodos)
          ->with('docente', $docente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      $docentes = [];
      foreach ($users as $user) {
        $item = ['id'=>$user->id, 'wdocente' => $user->wdocente];
        array_push($docentes, $item);
      }

      $newArray = collect($docentes)->sortBy('wdocente')->toArray();
      return view('app.periodos.create')->with('docentes',$newArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $docente = User::findOrFail($data['docente_id']);
        $cdocente = $docente->cdocente;
        $periodo = Periodo::create([
            'cdocente'=>$cdocente,
            'periodo'=>$data['periodo'],
            'fecha_ini'=>$data['fecha_ini'],
            'fecha_fin'=>$data['fecha_fin'],
            'status' => $data['status']
        ]);
        return redirect()->route('app.periodo.index', $docente->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $periodo_id)
    {
      $user = User::findOrFail($user_id);
      $periodo = Periodo::findOrFail($periodo_id);
      return view('app.periodos.edit')
          ->with('docente', $user)
          ->with('wdocente', $user->wdocente)
          ->with('data', $periodo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $periodo = Periodo::findOrFail($data['id']);
        if($periodo){
            $periodo->fecha_ini = $data['fecha_ini'];
            $periodo->fecha_fin = $data['fecha_fin'];
            $periodo->status = $data['status'];
            $periodo->save();
            return redirect()->route('app.periodo.index', $data['docente_id']);
        }else{
            return ['success'=>false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $periodo_id)
    {
      $user = User::findOrFail($user_id);
      $periodo = Periodo::findOrFail($periodo_id);
      if($periodo && $user){
        if($periodo->cdocente == $user->cdocente){
          $periodo->delete();
          return redirect()->route('app.periodo.index', $user_id);
        }else{
          return ['success'=>false];
        }
      }else{
        return ['success'=>false];
      }
    }
}
