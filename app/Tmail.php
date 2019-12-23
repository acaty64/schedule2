<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmail extends Model
{
    protected $table = 'tmails';

    protected $fillable = ['name', 'subject', 'view', 'limit_date', 'send_date'];

}
