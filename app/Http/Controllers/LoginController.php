<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use RefreshDatabase;

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
            return redirect('/loginGoogle');
        }
        
        auth()->login($appUser);

        $roles = $appUser->roles()->first();        

        return redirect('/home')->with('roles', $roles);

    }
}