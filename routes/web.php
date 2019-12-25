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


/////////////// SCHEDULE

Route::get('schedule/crono/show/{docente_id}', [
	'as'	=> 'api.schedule.crono.show',
	'uses'	=> 'Api\ScheduleController@cronoShow'
]);

Route::get('schedule/crono/pdf/{docente_id}', [
	'as'	=> 'api.schedule.crono.pdf',
	'uses'	=> 'Api\ScheduleController@cronoPdf'
]);

Route::get('schedule/crono/download/{docente_id}', [
	'as'	=> 'api.schedule.crono.download',
	'uses'	=> 'Api\ScheduleController@cronoDownload'
]);

Route::get('schedule/report/show/{docente_id}', [
	'as'	=> 'api.schedule.report.show',
	'uses'	=> 'Api\ScheduleController@reportShow'
]);

Route::get('schedule/report/pdf/{docente_id}', [
	'as'	=> 'api.schedule.report.pdf',
	'uses'	=> 'Api\ScheduleController@reportPdf'
]);

Route::get('schedule/report/download/pc/{docente_id}', [
	'as'	=> 'api.schedule.report.download.pc',
	'uses'	=> 'Api\ScheduleController@reportDownload_pc'
]);

Route::get('schedule/report/download/public/{docente_id}', [
	'as'	=> 'api.schedule.report.download.public',
	'uses'	=> 'Api\ScheduleController@reportDownload_public'
]);

Route::get('schedule/edit/{docente_id}', [
	'as'	=> 'app.schedule.edit',
	'uses'	=> 'ScheduleController@edit'
]);
