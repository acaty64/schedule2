<?php

// Route::get('email/reply/view/{tmail_id}/{docente_id}', [
// 	'as'	=> 'email.reply.view',
// 	'uses'	=> 'EmailController@reply_view'
// ]);
Route::get('doc/tests', [
	'as'	=> 'doc.tests',
	'uses'	=> 'TestsController@docente'
]);

Route::get('email/confirm/send/{tmail_id}/{docente_id}', [
	'as'	=> 'email.confirm.send',
	'uses'	=> 'EmailController@send_reply'
]);

Route::get('schedule/confirm/view/{tmail_id}/{docente_id}', [
	'as'	=> 'schedule.confirm.view',
	'uses'	=> 'ScheduleController@confirmView'
]);

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


/////////////// SCHEDULE

// Route::get('schedule/crono/show/{docente_id}', [
// 	'as'	=> 'api.schedule.crono.show',
// 	'uses'	=> 'Api\ScheduleController@cronoShow'
// ]);

// Route::get('schedule/crono/pdf/{docente_id}', [
// 	'as'	=> 'api.schedule.crono.pdf',
// 	'uses'	=> 'Api\ScheduleController@cronoPdf'
// ]);

// Route::get('schedule/crono/download/{docente_id}', [
// 	'as'	=> 'api.schedule.crono.download',
// 	'uses'	=> 'Api\ScheduleController@cronoDownload'
// ]);

// Route::get('schedule/report/show/{docente_id}', [
// 	'as'	=> 'api.schedule.report.show',
// 	'uses'	=> 'Api\ScheduleController@reportShow'
// ]);

// Route::get('schedule/report/pdf/{docente_id}', [
// 	'as'	=> 'api.schedule.report.pdf',
// 	'uses'	=> 'Api\ScheduleController@reportPdf'
// ]);

// Route::get('schedule/report/download/{docente_id}', [
// 	'as'	=> 'api.schedule.report.download',
// 	'uses'	=> 'Api\ScheduleController@reportDownload'
// ]);

// Route::get('schedule/edit/{docente_id}', [
// 	'as'	=> 'app.schedule.edit',
// 	'uses'	=> 'ScheduleController@edit'
// ]);

