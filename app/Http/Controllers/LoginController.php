<?php

namespace App\Http\Controllers;

use App\User;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
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
        }
        auth()->login($appUser);
        // return redirect('/home');

        $roles = $appUser->roles()->first();        

        return redirect('/home')->with('roles', $roles);

        // $appUser = User::firstOrCreate([
        //     'email' => $googleUser->getEmail()
        // ], [
        //     'name' => $googleUser->getName()
        // ]);

        // auth()->login($appUser);

        // return redirect('/home');
//         try {
//             $googleUser = Socialite::driver('google')->user();

//             $existingUser = User::where('email', $googleUser->getEmail())->first();
//             if($existingUser){
//                 auth()->login($existingUser);
//                 $roles = $existingUser->roles();
//                 return redirect('home')->with('roles', $roles);
//                 return "Bienvenido {$user->name} ({$user->email})";
//             }else{
// return 'Usted no está registrado. Por favor contáctese con ucss.fcec.lim@gmail.com';
//                 Flash::danger('Usted no está registrado. Por favor contáctese con ucss.fcec.lim@gmail.com');
//                 return redirect('/login');
//             }
//         } catch (\Exception $e) {
// flash::error( 'Error al loguearse');
//             return redirect('/');
//         }



        // try {
        //     $user = Socialite::driver('google')->user();
        // return "Bienvenido {$user->name} ({$user->email})";

        // } catch (\Exception $e) {
        //     return redirect('/login');
        // }

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