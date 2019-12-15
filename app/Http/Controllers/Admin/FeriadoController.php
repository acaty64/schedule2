<?php

namespace App\Http\Controllers\Admin;

use App\Feriado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feriados = Feriado::all();
        return view('app.feriados.index')->with('feriados', $feriados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.feriados.create');
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
// dd($data['fecha']);
//         // $fecha = date_create_from_format('d/m/Y', $data['fecha']);
//         $fecha = $data['fecha']->format('Y-m-d');
        $fecha = $data['fecha'];

        $check = Feriado::where('fecha', $fecha)->get();
        if(count($check) > 0){
            return 'El feriado '.$fecha->format('Y-m-d').' ya existe.';
        }

        Feriado::create([
            'fecha' => $fecha,
            'wferiado' => $data['wferiado'],
        ]);
        return redirect(route('app.feriado.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function show(Feriado $feriado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Feriado::findOrFail($id);
        return view('app.feriados.edit')
        ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $data = request()->all();
        $feriado = Feriado::findOrFail($data['id']);
        if($feriado){
            $feriado->fecha = $data['fecha'];
            $feriado->wferiado = $data['wferiado'];
            $feriado->save();
            return redirect(route('app.feriado.index'));
        }else{
            return ['success'=>false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feriado = Feriado::findOrFail($id);
        if($feriado){
            $feriado->delete();
            return redirect()->route('app.feriado.index');
        }else{
            return ['success'=>false];
        }   
  }
}
