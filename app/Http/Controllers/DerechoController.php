<?php

namespace App\Http\Controllers;

use App\Derecho;
use App\Trace;
use App\User;
use Illuminate\Http\Request;

class DerechoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($docente_id)
    {
      $docente = User::findOrFail($docente_id);
      $derechos = Derecho::where('cdocente', $docente->cdocente)->get();
      return view('app.derechos.index')
        ->with('derechos', $derechos)
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
      return view('app.derechos.create')->with('docentes',$newArray);
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
      $docente = User::findOrFail($data['docente']);
      $cdocente = $docente->cdocente;
      $periodo = $data['periodo'];
      $dias = $data['dias'];
      $derecho = Derecho::create([
        'cdocente' => $cdocente,
        'periodo' => $periodo,
        'dias' => $dias
      ]);
      $trace = Trace::create([
        'cdocente' => $cdocente,
        'docente_id' => $docente->id,
        'change' => 'Create Derechos',
        'user_change' => \Auth::user()->id,
      ]);
      flash('Derechos del docente: ' . $docente->wdocente . 'grabado.')->success();
      return redirect()->route('app.derecho.index', $data['docente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Derecho  $derecho
     * @return \Illuminate\Http\Response
     */
    public function show(Derecho $derecho)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Derecho  $derecho
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $derecho_id)
    {
      $user = User::findOrFail($user_id);
      $derecho = Derecho::findOrFail($derecho_id);
      return view('app.derechos.edit')
      ->with('docente', $user)
      ->with('data', $derecho);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Derecho  $derecho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $data = $request->all();
      $derecho = Derecho::findOrFail($data['id']);
      if($derecho){
        if($derecho->cdocente == $data['cdocente']){        
          $derecho->periodo = $data['periodo'];
          $derecho->dias = $data['dias'];
          $derecho->save();
          $trace = Trace::create([
            'cdocente' => $data['cdocente'],
            'docente_id' => $data['id'],
            'change' => 'Update Derechos',
            'user_change' => \Auth::user()->id,
          ]);
          flash('Derechos del docente modificado.')->success();
          return redirect()->route('app.derecho.index', $data['id']);
        }else{
          flash('Derechos no modificados.')->error();
          return ['success'=>false];
        }
      }else{
        flash('Derechos no modificados.')->error();
        return ['success'=>false];
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Derecho  $derecho
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $derecho_id)
    {
      $user = User::findOrFail($user_id);
      $derecho = Derecho::findOrFail($derecho_id);
      if($derecho && $user){
        if($derecho->cdocente == $user->cdocente){
          $derecho->delete();
          $trace = Trace::create([
            'cdocente' => $user->cdocente,
            'docente_id' => $user->id,
            'change' => 'Delete Derechos',
            'user_change' => \Auth::user()->id,
          ]);
          flash('Derechos eliminados.')->success();          
          return redirect()->route('app.derecho.index', $user_id);
        }else{
          flash('Derechos NO eliminados.')->error();          
          return ['success'=>false];
        }
      }else{
        flash('Derechos NO eliminados.')->error();          
        return ['success'=>false];
      }
    }
  }
