<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Envia al usuario a la pagina de inicio de GitHub.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtiene la información del usuario de GitHub.
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        return "Bienvenido {$user->name} ({$user->email})";

        } catch (\Exception $e) {
            return redirect('/login');
        }
        // // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'company.com'){
        //     return redirect()->to('/');
        // }
        // // check if they're an existing user
        // $existingUser = User::where('email', $user->email)->first();
        // if($existingUser){
        //     // log them in
        //     auth()->login($existingUser, true);
        // } else {
        //     // create a new user
        //     $newUser                  = new User;
        //     $newUser->name            = $user->name;
        //     $newUser->email           = $user->email;
        //     $newUser->google_id       = $user->id;
        //     $newUser->avatar          = $user->avatar;
        //     $newUser->avatar_original = $user->avatar_original;
        //     $newUser->save();
        //     auth()->login($newUser, true);
        // }
        // return redirect()->to('/home');

        // $googleUser = Socialite::driver('google')->user();
// dd('handleGoogleCallback');
//         $googleUser = Socialite::with('Google')->stateless();
//         $googleUser = Socialite::driver('google')->stateless()->user();
// dd($googleUser);

        // return "Bienvenido {$googleUser->name} ({$googleUser->nickname})";
    }
}