<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class ConsultaMiddleware
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            Auth::logout();
            return redirect()->to('loginGoogle');
        };
        if(\Session::get('ctype') == 'consulta'){
            return $next($request);
        }else{
            return redirect()->to('loginGoogle');
        }
    }
}
