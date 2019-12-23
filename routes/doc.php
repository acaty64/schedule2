<?php
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

Route::get('schedule/report/download/{docente_id}', [
	'as'	=> 'api.schedule.report.download',
	'uses'	=> 'Api\ScheduleController@reportDownload'
]);

Route::get('schedule/edit/{docente_id}', [
	'as'	=> 'app.schedule.edit',
	'uses'	=> 'ScheduleController@edit'
]);

