<?php

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

Route::get('sys/backup', [
	'as'	=> 'backup.index',
	'uses'	=> 'Sys\BackupController@index'
]);

Route::get('sys/backup/destroy/{file}', [
	'as'	=> 'backup.destroy',
	'uses'	=> 'Sys\BackupController@destroy'
]);

Route::get('sys/backup/create', [
	'as'	=> 'backup.create',
	'uses'	=> 'Sys\BackupController@create'
]);

Route::get('sys/backup/download/{file}', [
	'as'	=> 'backup.download',
	'uses'	=> 'Sys\BackupController@download'
]);

Route::fallback(function()
{
	return response('Página no encontrada', 404);
});