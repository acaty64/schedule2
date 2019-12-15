<?php

namespace App\Http\Controllers\Admin;

use App\Horario;
use App\Http\Controllers\Controller;
use App\Semestre;
use App\User;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($docente_id)
    {
        $docente = User::findOrFail($docente_id);
        $todo = Horario::where('cdocente', $docente->cdocente)->get();
        $horarios = $todo->sortBy('semestre');
        $semestres = $horarios->unique('semestre');
        $data = [];
        foreach ($semestres as $s) {
            $semestre = $s->semestre;
            $filtro = $horarios->where('semestre', $semestre);
            $registro = ['semestre'=>$semestre, 'LUN'=>'libre', 'MAR'=>'libre', 'MIE'=>'libre', 'JUE'=>'libre', 'VIE'=>'libre', 'SAB'=>'libre'];
            foreach ($filtro as $item) {
                $registro[$item->dia] = $item->turno;
            }
            if($filtro){
                array_push($data, $registro);
            }
        }
        return view('app.horarios.index')
            ->with('docente', $docente)
            ->with('data', $data);
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
      $semestres=Semestre::all();
      $newArray = collect($docentes)->sortBy('wdocente')->toArray();
      return view('app.horarios.create')
            ->with('docentes',$newArray)
            ->with('semestres',$semestres);
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
        $semestre = $data['semestre'];
        $semana = ['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
        foreach ($semana as $dia) {
            $turno = $data[$dia];
            if($turno <> 'libre'){
                $horario = Horario::create([
                    'semestre' => $semestre,
                    'cdocente' => $cdocente,
                    'dia' => $dia,
                    'turno' => $turno
                ]);
            }
        }
        // return redirect()->route('app.horario.create');
        return redirect('schedule/edit/'.$docente->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($docente_id, $semestre)
    {
        $docente = User::findOrFail($docente_id);
        $horarios = Horario::where('cdocente', $docente->cdocente)->where('semestre', $semestre)->get();
        $semana = ['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
        $registro = ['semestre'=>$semestre, 'LUN'=>'libre', 'MAR'=>'libre', 'MIE'=>'libre', 'JUE'=>'libre', 'VIE'=>'libre', 'SAB'=>'libre'];
        foreach ($horarios as $item) {
            $registro[$item->dia] = $item->turno;
        }
        return view('app.horarios.edit')
            ->with('docente', $docente)
            ->with('data', $registro)
            ->with('semana', $semana);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $docente = User::findOrFail($data['docente_id']);
        $cdocente = $docente->cdocente;
        $semestre = $data['semestre'];
        $semana = ['LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'];
        foreach ($semana as $dia) {
            $turno = $data[$dia];
            $datos = Horario::where('cdocente', $cdocente)->where('semestre', $semestre)->where('dia', $dia)->get();
            $registro = $datos->first();
            if($registro){
                if($turno <> 'libre'){
                    $registro->turno = $turno;
                    $registro->save();
                }else{
                    $registro->delete();
                }
            }else{
                if($turno <> 'libre'){
                    $horario = Horario::create([
                        'semestre' => $semestre,
                        'cdocente' => $cdocente,
                        'dia' => $dia,
                        'turno' => $turno
                    ]);
                }                
            }
        }
        // return redirect()->route('app.horario.create');
        return redirect('horario/read/'.$docente->id);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($docente_id, $semestre)
    {
      $user = User::findOrFail($docente_id);
      $datos = Horario::where('cdocente', $user->cdocente)->where('semestre', $semestre)->get();
      if($datos && $user){
        foreach ($datos as $horario) {
          $horario->delete();
        }
        return redirect('horario/read/'.$user->id);
      }else{
        return ['success'=>false];
      }
    }
}
