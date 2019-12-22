<?php

namespace App;

use App\Role;
use App\Trole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $append = ['cdocente', 'wdocente', 'isAdmin', 'isMaster', 'isDoc'];

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function getIsMasterAttribute()
    {
        $trole = Trole::where('acronym', 'master')->first();
        $rol = Role::where('user_id', $this->id)->where('trole_id', $trole->id)->first();
        if(!$rol){
            return false;
        }
        return true;
    }

    public function getIsAdminAttribute()
    {
        $trole = Trole::where('acronym', 'admin')->first();
        $rol = Role::where('user_id', $this->id)->where('trole_id', $trole->id)->first();
        if(!$rol){
            return false;
        }
        return true;
    }

    public function getIsDocAttribute()
    {
        $trole = Trole::where('acronym', 'doc')->first();
        $rol = Role::where('user_id', $this->id)->where('trole_id', $trole->id)->first();
        if(!$rol){
            return false;
        }
        return true;
    }

    public function roles()
    {
        $roles = Role::where('user_id', $this->id)->get();
        return $roles;
        // return $this->belongsToMany(Trole::class, 'user_id');
    }


    public function getCdocenteAttribute()
    {
        $dataUser = DataUser::where('user_id', $this->id)->first();
        if(!$dataUser){
            return '';
        }
        return $dataUser->cdocente;
    }

    public function getWdocenteAttribute()
    {
        return $this->name;
        // $dataUser = DataUser::where('user_id', $this->id)->first();
        // return $dataUser->wdoc3 . " " . $dataUser->wdoc2 . ", " . $dataUser->wdoc1;
    }
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
