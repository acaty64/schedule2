<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
   	protected $table = 'datausers';		
    protected $fillable = [	
        'user_id',
        'wdoc1',
        'wdoc2',
        'wdoc3',	
    	'cdocente',
    	'fono1',
    	'fono2',
    	'email1',
    	'email2',
        // 'whatsapp',
        'wdocente'
    ];

     /**
     * Get the user that owns the data.
     */
    public function user()
    {
        /* return $this->belongsTo('App\User', 'foreign_key'); */
        return $this->belongsTo('App\User');
    }

    public function wdocente()
    {
        return $this->wdoc2 . ' ' . $this->wdoc3 . ', ' . $this->wdoc1;
    }


    	
}
