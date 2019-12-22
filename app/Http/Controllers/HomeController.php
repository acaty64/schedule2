<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = auth()->user()->roles();
        if(!\Session::get('rol')){
            $rol = $roles->first()->trole->acronym;
            \Session::put('rol', $rol);            
        }
        return view('home')->with('roles', $roles);
    }
}
