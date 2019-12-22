<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

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
            return redirect()->to('loginGoogle');
        };

        if(!Auth::user()->isAdmin){
            return redirect()->to('login');
            return redirect()->to('loginGoogle');
        }else{
            return $next($request);
        }

        // return $next($request);
    }


}
