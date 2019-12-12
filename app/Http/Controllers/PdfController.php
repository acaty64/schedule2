<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function allVacacionesPDF()
    {
    	/**** DE 10 EN 10 ***/ 
    	$n = 15;
    	$registros = [$n*10, ($n*10)+9];
    	$users = User::where('id','>=', $registros[0])
    					->where('id', '<=', $registros[1])->get();    	
    	// $users = User::all();
    	$qregistros = $users->count();
    	foreach ($users as $user) {
	    	$datos = $user['programadas'];
	    	$programadas = [];
	    	foreach ($datos as $item) {
	    		array_push($programadas, [
	    			'fecha_ini' => $item['fecha_ini'], 
	    			'fecha_fin' => $item['fecha_fin'], 
	    			'dias' => $item['dias']
	    		]);
	    	}
	    	$data = [
	    		'cod_doc' => $user['cod_doc'],
	    		'name' => $user['name'],
	    		'ganadas' => $user['ganada']['dias'],
	    		'pendientes' => $user['pendientes'],
	    		'limite' => $user['rango']['fecha_fin'],
	    		'periodo' => $user['rango']['periodo'],
	    		'programado' => $programadas,
	    	];

	        $html = '';
	        $view = view('pdf.vacaciones')->with(compact('data'));
	        $html .= $view->render();
			$file_out = $data['name'] . '.pdf';
	        PDF::loadHTML($html)->save(public_path().'/vacaciones/'.$file_out); 
    	}
    	return 'Archivos completos Registros: '.$qregistros." De: ".$registros[0]." Al: ".$registros[1];

    }

    // public function allPDF()
    // {
    // 	$users = User::where('id','<', 5)->get();
    // 	foreach ($users as $user) {
    // 		$this->uno($user->cod_doc);
    // 	}
    // }

}
