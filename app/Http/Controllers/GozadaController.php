<?php

namespace App\Http\Controllers;

use App\Gozada;
use App\User;
use Illuminate\Http\Request;
use DateTime;

class GozadaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($docente_id)
    {
      $docente = User::findOrFail($docente_id);
      $gozadas = Gozada::where('cdocente', $docente->cdocente)->get();
      return view('app.gozadas.index')
          ->with('gozadas', $gozadas)
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
      return view('app.gozadas.create')->with('docentes',$newArray);
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
        $gozada = Gozada::create([
            'cdocente'=>$cdocente,
            'fecha_ini'=>$data['fecha_ini'],
            'fecha_fin'=>$data['fecha_fin'],
            'observaciones'=>$data['observaciones'],
        ]);
        return redirect()->route('app.gozada.index', $docente->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Gozada  $gozada
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
    public function edit($user_id, $gozada_id)
    {
      $user = User::findOrFail($user_id);
      $gozada = Gozada::findOrFail($gozada_id);
      return view('app.gozadas.edit')
          ->with('docente', $user)
          ->with('wdocente', $user->wdocente)
          ->with('data', $gozada);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gozada  $gozada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $gozada = Gozada::findOrFail($data['id']);
        if($gozada){
            $gozada->fecha_ini = $data['fecha_ini'];
            $gozada->fecha_fin = $data['fecha_fin'];
            $gozada->observaciones = $data['observaciones'];
            $gozada->save();
            return redirect()->route('app.gozada.index', $data['docente_id']);
        }else{
            return ['success'=>false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gozada  $gozada
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $gozada_id)
    {
      $user = User::findOrFail($user_id);
      $gozada = Gozada::findOrFail($gozada_id);
      if($gozada && $user){
        if($gozada->cdocente == $user->cdocente){
          $gozada->delete();
          return redirect()->route('app.gozada.index', $user_id);
        }else{
          return ['success'=>false];
        }
      }else{
        return ['success'=>false];
      }
    }
}
