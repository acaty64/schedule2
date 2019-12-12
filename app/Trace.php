<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    protected $fillable = [
    	'cdocente',
    	'docente_id',
    	'change',
    	'user_change',
		'deadline',
		'send',
		'user_send',
		'read',
		'user_read',
		'reply',
		'user_reply',
		'confirm',
		'user_confirm',
		'closed',
    ];
}
