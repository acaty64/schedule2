<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DateController extends Controller
{
	function showDate(Request $request)
    {
 
       dd($request->date);
    }
}
