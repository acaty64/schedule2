<?php

namespace Tests;

use App\Roles;
use App\DataUser;
use App\User;
//use Illuminate\Support\Facades\Session;

//use Illuminate\Contracts\Console\Kernel;

trait TestsHelper
{
    protected $user;
    protected $defaultUser;
    protected $defaultDataUser;
    protected $authUser;

    public function defaultUser(array $attributes = [])
    {
        if($this->defaultUser){
            return $this->defaultUser;
        }
        return $this->defaultUser = $this->user($attributes);
        // factory(User::class)->create($attributes);
    }


    private function user(array $attributes = [])
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

        return $user;
    }


}
