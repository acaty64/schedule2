<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Master', 
            'email' => 'ucss.horarios@gmail.com', 
            'password' => bcrypt('secret')
                ]);
        User::create([
            'name' => 'User Administrador', 
            'email' => 'ucss.fcec.lim@gmail.com', 
            'password' => bcrypt('secret')
                ]);
        User::create([
            'name' => 'User Docente', 
            'email' => 'docente@gmail.com', 
            'password' => bcrypt('secret')
                ]);
        User::create([
            'name' => 'User Consulta', 
            'email' => 'consulta@gmail.com', 
            'password' => bcrypt('secret')
                ]);
        if(env('APP_ENV') == 'testing'){
            factory(User::class,10)->create();            
        }else{
            factory(User::class,20)->create();            
        }
    }
}
