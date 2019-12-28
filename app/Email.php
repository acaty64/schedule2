<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    protected $fillable = [
    	    'tmail_id',
            'from',
            'to',
            'user_id_to',
            'cc1',
            'cc2',
            'view',
            'send_date',
            'limit_date',
            'reply_date',
            'file_to_attach1',
            'file_name1',
            'file_to_attach2',
            'file_name2'
    ];

}
