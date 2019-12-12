<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class VacacionesController extends Controller
{
    public function index()
    {
        $users = User::all()->sortBy('name');
        return $users; 
        // view('app.vacaciones.index')->with('data', $users);
    }

}
