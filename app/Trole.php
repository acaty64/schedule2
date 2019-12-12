<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class Trole extends Model
{
    protected $fillable = [
        'name', 'acronym'
    ];

    public function role()
    {
    	return $this->HasMany(Role::class, 'trole_id');
    }


}
