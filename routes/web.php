<?php

use Illuminate\Session\flash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('thanks', function () {
	flash('Correo electrónico de confirmación enviado.')->success();
    return view('thanks');
});

Route::get('login',[
	'as' => 'login',
	'uses' => 'LoginController@redirectToGoogle'
]);

Route::get('login/callback',[
	'as' => 'login.callback',
	'uses' => 'LoginController@handleGoogleCallback'
]);

Route::post('logout',[
	'as' => 'logout',
	'uses' => 'Auth\LoginController@logout'
]);

Route::get('log', function ()
{
	return view('auth.login');
});

Route::post('login',[
	'as' => 'loginPost',
	'uses' => '\App\Http\Controllers\Auth\LoginController@login'
]);
	// 'uses' => '\Illuminate\Foundation\Auth\AuthenticatesUsers@login'

// Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

// Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('home', function () {
//     return view('home');
// });

// Route::get('login',[
// 	'as' => 'login',
// 	'uses' => 'Auth\LoginController@login'
// ]);

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('login/callback', 'LoginController@handleGoogleCallback');