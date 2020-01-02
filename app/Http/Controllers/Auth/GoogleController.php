<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Envia al usuario a la pagina de inicio de Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtiene la información del usuario de Google.
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $appUser = User::where('email', $googleUser->getEmail())->first();


        if(!$appUser){
            return redirect('/login');
            // return redirect('/loginGoogle');
        }
        auth()->login($appUser);

        $roles = $appUser->roles()->first();        

        \Session::put('rol', $roles->acronym);

        if($roles->acronym == 'doc'){
            return redirect(route('app.schedule.edit', $appUser->id));
        }
        return redirect('/home')->with('roles', $roles);
    }
}