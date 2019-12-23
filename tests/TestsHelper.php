<?php

namespace Tests;

use App\DataUser;
use App\Role;
use App\Roles;
use App\Trole;
use App\User;
//use Illuminate\Support\Facades\Session;

//use Illuminate\Contracts\Console\Kernel;

trait TestsHelper
{
    protected $user;
    protected $defaultUser;
    protected $defaultDataUser;
    protected $authUser;

    public function defaultUser(array $attributes = [], $type)
    {
        // if($this->defaultUser){
        //     return $this->defaultUser;
        // }
        return $this->defaultUser = $this->user($attributes, $type);
        // factory(User::class)->create($attributes);
    }

    private function user(array $attributes = [], $type)
    {
        if($this->user){
            return $this->user;
        }

        $user  = factory(User::class)->create($attributes);
        $dataUser = DataUser::create([
            'user_id' => $user->id,
            'wdoc1' => $user->name,
            'cdocente' => '0000' . $user->id,
            'email1' => $user->email,
        ]);

        $role = $this->role($user, $type);

        return $user;
    }

    public function role($user, $type)
    {
        $troles = $this->troles();
        try {
            $trole = Trole::where('acronym', $type)->first();
            $role = Role::create([
                'user_id' => $user->id,
                'trole_id' => $trole->id
            ]);
        } catch (Exception $e) {
            return $e;
        }
        return $role;
    }

    private function troles()
    {
        try {
            Trole::create(['name'=>'Master', 'acronym'=>'master']);
            Trole::create(['name'=>'Administrador', 'acronym'=>'admin']);
            Trole::create(['name'=>'Docente', 'acronym'=>'doc']);
            Trole::create(['name'=>'Consulta', 'acronym'=>'cons']);            
        } catch (Exception $e) {
            return $e;
        }
        return true;
    }

}
