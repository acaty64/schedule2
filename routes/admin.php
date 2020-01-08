<?php
Route::get('admin/tests', [
	'as'	=> 'admin.tests',
	'uses'	=> 'TestsController@admin'
]);

Route::get('home', 'HomeController@index')->name('home');

Route::get('email/send/notification/{tmail_id}', [
	'as'	=> 'app.email.send.notification',
	'uses'	=> 'EmailController@send_notification'
]);

/// SCHEDULE
Route::get('schedule/index', [
	'as'	=> 'app.schedule.index',
	'uses'	=> 'ScheduleController@index'
]);

/// EMAILS
Route::post('email/store', [
	'as'	=> 'app.email.store',
	'uses'	=> 'EmailController@store'
]);
Route::get('email/index/{tmail_id}', [
	'as'	=> 'app.email.index',
	'uses'	=> 'EmailController@index'
]);

Route::get('email/show/{tmail_id}', [
	'as'	=> 'app.email.show',
	'uses'	=> 'EmailController@show'
]);


/// TMAILS
Route::get('tmail/create', [
	'as'	=> 'app.tmail.create',
	'uses'	=> 'TmailController@create'
]);

Route::post('tmail/store', [
	'as'	=> 'app.tmail.store',
	'uses'	=> 'TmailController@store'
]);

Route::get('tmail/index', [
	'as'	=> 'app.tmail.index',
	'uses'	=> 'TmailController@index'
]);

Route::get('tmail/edit/{id}', [
	'as'	=> 'app.tmail.edit',
	'uses'	=> 'TmailController@edit'
]);

Route::post('tmail/update', [
	'as'	=> 'app.tmail.update',
	'uses'	=> 'TmailController@update'
]);

Route::get('tmail/destroy/{id}', [
	'as'	=> 'app.tmail.destroy',
	'uses'	=> 'TmailController@destroy'
]);

/// DERECHOS
Route::get('derecho/create', [
	'as'	=> 'app.derecho.create',
	'uses'	=> 'DerechoController@create'
]);

Route::post('derecho/store', [
	'as'	=> 'app.derecho.store',
	'uses'	=> 'DerechoController@store'
]);

Route::get('derecho/read/{docente_id}', [
	'as'	=> 'app.derecho.index',
	'uses'	=> 'DerechoController@index'
]);

Route::get('derecho/edit/{docente_id}/{id}', [
	'as'	=> 'app.derecho.edit',
	'uses'	=> 'DerechoController@edit'
]);

Route::post('derecho/update', [
	'as'	=> 'app.derecho.update',
	'uses'	=> 'DerechoController@update'
]);

Route::get('derecho/destroy/{docente_id}/{id}', [
	'as'	=> 'app.derecho.destroy',
	'uses'	=> 'DerechoController@destroy'
]);


/// FERIADOS
Route::get('feriado/create', [
	'as'	=> 'app.feriado.create',
	'uses'	=> 'FeriadoController@create'
]);

Route::post('feriado/store', [
	'as'	=> 'app.feriado.store',
	'uses'	=> 'FeriadoController@store'
]);

Route::post('holiday/store', [
	'as'	=> 'app.holiday.store',
	'uses'	=> 'HolidayController@store'
]);

Route::get('feriado/read', [
	'as'	=> 'app.feriado.index',
	'uses'	=> 'FeriadoController@index'
]);

Route::get('feriado/edit/{id}', [
	'as'	=> 'app.feriado.edit',
	'uses'	=> 'FeriadoController@edit'
]);

Route::post('feriado/update', [
	'as'	=> 'app.feriado.update',
	'uses'	=> 'FeriadoController@update'
]);

Route::get('feriado/destroy/{id}', [
	'as'	=> 'app.feriado.destroy',
	'uses'	=> 'FeriadoController@destroy'
]);

/// HORARIOS
Route::get('horario/create', [
	'as'	=> 'app.horario.create',
	'uses'	=> 'HorarioController@create'
]);

Route::post('horario/store', [
	'as'	=> 'app.horario.store',
	'uses'	=> 'HorarioController@store'
]);

Route::get('horario/read/{docente_id}', [
	'as'	=> 'app.horario.index',
	'uses'	=> 'HorarioController@index'
]);

Route::get('horario/edit/{docente_id}/{semestre}', [
	'as'	=> 'app.horario.edit',
	'uses'	=> 'HorarioController@edit'
]);

Route::post('horario/update', [
	'as'	=> 'app.horario.update',
	'uses'	=> 'HorarioController@update'
]);

Route::get('horario/destroy/{docente_id}/{semestre}', [
	'as'	=> 'app.horario.destroy',
	'uses'	=> 'HorarioController@destroy'
]);

/// PERIODOS
Route::get('periodo/create', [
	'as'	=> 'app.periodo.create',
	'uses'	=> 'PeriodoController@create'
]);

Route::post('periodo/store', [
	'as'	=> 'app.periodo.store',
	'uses'	=> 'PeriodoController@store'
]);

Route::get('periodo/read/{docente_id}', [
	'as'	=> 'app.periodo.index',
	'uses'	=> 'PeriodoController@index'
]);

Route::get('periodo/edit/{docente_id}/{id}', [
	'as'	=> 'app.periodo.edit',
	'uses'	=> 'PeriodoController@edit'
]);

Route::post('periodo/update', [
	'as'	=> 'app.periodo.update',
	'uses'	=> 'PeriodoController@update'
]);

Route::get('periodo/destroy/{docente_id}/{id}', [
	'as'	=> 'app.periodo.destroy',
	'uses'	=> 'PeriodoController@destroy'
]);
/// PROGRAMADAS
Route::get('programada/create', [
	'as'	=> 'app.programada.create',
	'uses'	=> 'ProgramadaController@create'
]);

Route::post('programada/store', [
	'as'	=> 'app.programada.store',
	'uses'	=> 'ProgramadaController@store'
]);

Route::get('programada/read/{docente_id}', [
	'as'	=> 'app.programada.index',
	'uses'	=> 'ProgramadaController@index'
]);

Route::get('programada/edit/{docente_id}/{id}', [
	'as'	=> 'app.programada.edit',
	'uses'	=> 'ProgramadaController@edit'
]);

Route::post('programada/update', [
	'as'	=> 'app.programada.update',
	'uses'	=> 'ProgramadaController@update'
]);

Route::get('programada/destroy/{docente_id}/{id}', [
	'as'	=> 'app.programada.destroy',
	'uses'	=> 'ProgramadaController@destroy'
]);

/// GOZADAS
Route::get('gozada/create', [
	'as'	=> 'app.gozada.create',
	'uses'	=> 'GozadaController@create'
]);

Route::post('gozada/store', [
	'as'	=> 'app.gozada.store',
	'uses'	=> 'GozadaController@store'
]);

Route::get('gozada/read/{docente_id}', [
	'as'	=> 'app.gozada.index',
	'uses'	=> 'GozadaController@index'
]);

Route::get('gozada/edit/{docente_id}/{id}', [
	'as'	=> 'app.gozada.edit',
	'uses'	=> 'GozadaController@edit'
]);

Route::post('gozada/update', [
	'as'	=> 'app.gozada.update',
	'uses'	=> 'GozadaController@update'
]);

Route::get('gozada/destroy/{docente_id}/{id}', [
	'as'	=> 'app.gozada.destroy',
	'uses'	=> 'GozadaController@destroy'
]);


