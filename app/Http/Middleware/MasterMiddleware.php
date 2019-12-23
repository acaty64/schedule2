<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class MasterMiddleware
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            Auth::logout();
            return redirect()->to('login');
            return redirect()->to('loginGoogle');
        };
        if(Auth::user()->isMaster){
            return $next($request);
        }else{
            return redirect()->to('home');
            // return redirect()->to('loginGoogle');
        }
    }
}
