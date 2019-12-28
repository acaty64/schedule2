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
	'as'	=> 'schedule.crono.show',
	'uses'	=> 'ScheduleController@cronoShow'
]);

Route::get('schedule/crono/pdf/{docente_id}', [
	'as'	=> 'schedule.crono.pdf',
	'uses'	=> 'ScheduleController@cronoPdf'
]);

Route::get('schedule/crono/download/pc/{docente_id}', [
	'as'	=> 'crono.download.pc',
	'uses'	=> '\App\Http\Classes\Report@cronoDownload_pc'
]);

Route::get('schedule/crono/download/storage/{docente_id}', [
	'as'	=> 'crono.download.storage',
	'uses'	=> '\App\Http\Classes\Report@cronoDownload_storage'
]);

Route::get('schedule/report/show/{docente_id}', [
	'as'	=> 'schedule.report.show',
	'uses'	=> 'ScheduleController@reportShow'
]);

Route::get('schedule/report/pdf/{docente_id}', [
	'as'	=> 'schedule.report.pdf',
	'uses'	=> 'ScheduleController@reportPdf'
]);

Route::get('schedule/report/download/pc/{docente_id}', [
	'as'	=> 'report.download.pc',
	'uses'	=> '\App\Http\Classes\Report@reportDownload_pc'
]);

Route::get('schedule/report/download/storage/{docente_id}', [
	'as'	=> 'report.download.storage',
	'uses'	=> '\App\Http\Classes\Report@reportDownload_storage'
]);

Route::get('schedule/edit/{docente_id}', [
	'as'	=> 'app.schedule.edit',
	'uses'	=> 'ScheduleController@edit'
]);
