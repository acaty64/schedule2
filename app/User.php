<?php

namespace App;

use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $append = ['cdocente', 'wdocente'];

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function roles()
    {
        $roles = Role::where('user_id', $this->id)->get();
        return $roles;
        // return $this->belongsToMany(Trole::class, 'user_id');
    }


    public function getCdocenteAttribute()
    {
        $dataUser = DataUser::where('user_id', $this->id)->first();
        return $dataUser->cdocente;
    }

    public function getWdocenteAttribute()
    {
        $dataUser = DataUser::where('user_id', $this->id)->first();
        return $dataUser->wdoc3 . " " . $dataUser->wdoc2 . ", " . $dataUser->wdoc1;
    }
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
