<?php

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
    return view('welcome');
});

// Route::get('home', function () {
//     return view('home');
// });

Route::get('login',[
	'as' => 'login',
	'uses' => 'Auth\LoginController@login'
]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('loginGoogle',[
	'as' => 'loginGoogle',
	'uses' => 'LoginController@redirectToGoogle'
]);
Route::get('login/callback', 'LoginController@handleGoogleCallback');

Route::get('logout',[
	'as' => 'logout',
	'uses' => 'Auth\LoginController@logout'
]);
// Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();


