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
    ];

}
