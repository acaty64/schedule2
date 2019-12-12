<?php

namespace App\Http\Controllers;

use App\Programada;
use App\User;
use Illuminate\Http\Request;
use DateTime;

class ProgramadaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($docente_id)
    {
      $docente = User::findOrFail($docente_id);
      $programadas = Programada::where('cdocente', $docente->cdocente)->get();
      return view('app.programadas.index')
          ->with('programadas', $programadas)
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
      return view('app.programadas.create')->with('docentes',$newArray);
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
        $programada = Programada::create([
            'cdocente'=>$cdocente,
            'fecha_ini'=>$data['fecha_ini'],
            'fecha_fin'=>$data['fecha_fin'],
            'paso'=>$data['paso'],
            'maximo'=>$data['maximo'],
            'type' => $data['type']
        ]);
        return redirect()->route('app.programada.index', $docente->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Programada  $programada
     * @return \Illuminate\Http\Response
     */
    public function show($cod_doc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $cod_doc
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $periodo_id)
    {
      $user = User::findOrFail($user_id);
      $programada = Programada::findOrFail($periodo_id);
      return view('app.programadas.edit')
          ->with('docente', $user)
          ->with('wdocente', $user->wdocente)
          ->with('data', $programada);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programada  $programada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $programada = Programada::findOrFail($data['id']);
        if($programada){
            $programada->fecha_ini = $data['fecha_ini'];
            $programada->fecha_fin = $data['fecha_fin'];
            $programada->paso = $data['paso'];
            $programada->maximo = $data['maximo'];
            $programada->type = $data['type'];
            $programada->save();
            return redirect()->route('app.programada.index', $data['docente_id']);
        }else{
            return ['success'=>false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programada  $programada
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $programada_id)
    {
      $user = User::findOrFail($user_id);
      $programada = Programada::findOrFail($programada_id);
      if($programada && $user){
        if($programada->cdocente == $user->cdocente){
          $programada->delete();
          return redirect()->route('app.programada.index', $user_id);
        }else{
          return ['success'=>false];
        }
      }else{
        return ['success'=>false];
      }
    }
}
