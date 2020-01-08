<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function master()
    {
        return view('tests')->with('data', 'Master');
    }
    public function admin()
    {
        return view('tests')->with('data', 'Administrador');
    }
    public function docente()
    {
        return view('tests')->with('data', 'Docente');
    }
    public function web()
    {
        return view('tests')->with('data', 'Web');
    }
}
