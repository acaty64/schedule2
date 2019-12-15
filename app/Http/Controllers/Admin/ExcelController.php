<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VacacionesExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function vacacionesIndex()
    {

    	return Excel::download(new VacacionesExport, 'vacaciones.xlsx');
    	// Excel::create('Vacaciones', function ($excel)
    	// {
    	// 	$excel->sheet('Sheetname', function ($sheet)
    	// 	{
    	// 		$data=[];
    	// 		array_push($data, ['Kevin', 'Arnold']);
    	// 		$sheet->fromArray($data);
    	// 	});
    	// })->download('xlsx');
    }
}
