<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
            // return redirect()->to('login');
        };
        if(Auth::user()->isAdmin || Auth::user()->isMaster){
            return $next($request);
        }else{
            return redirect()->to('login');
            // return redirect()->to('loginGoogle');
        }

        // return $next($request);
    }


}
