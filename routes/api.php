<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('schedule/periodos/save', [
	'as'	=> 'schedule.periodos.save',
	'uses'	=> 'Api\ScheduleController@savePeriodos'
]);

Route::get('schedule/calendar/dataShow/{docente_id}', [
	'as'	=> 'schedule.calendar.show',
	'uses'	=> 'Api\ScheduleController@dataShow'
]);

Route::get('schedule/index', [
	'as'	=> 'schedule.index',
	'uses'	=> 'Api\ScheduleController@index'
]);

// Route::get('schedule/edit/{cod_doc}', [
// 	'as'	=> 'schedule.edit',
// 	'uses'	=> 'Api\ScheduleController@edit'
// ]);

Route::get('schedule/data/{docente_id}', [
	'as'	=> 'schedule.data',
	'uses'	=> 'Api\ScheduleController@data'
]);

Route::post('schedule/save', [
	'as'	=> 'schedule.save',
	'uses'	=> 'Api\ScheduleController@save'
]);

Route::get('vacaciones/index', [
	'as'	=> 'api.vacaciones.index',
	'uses'	=> 'Api\VacacionesController@index'
]);
Route::post('schedule/create', [
	'as'	=> 'schedule.create',
	'uses'	=> 'Api\ScheduleController@create'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
