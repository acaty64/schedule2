<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'user_id' => 1, 
        	'trole_id' => 1, 
        ]);
        Role::create([
        	'user_id' => 2, 
        	'trole_id' => 2, 
        ]);
        Role::create([
        	'user_id' => 3, 
        	'trole_id' => 3, 
        ]);
        Role::create([
        	'user_id' => 4, 
        	'trole_id' => 4, 
        ]);
    	$users = User::where('id','>', 4)->get();
    	foreach ($users as $user) {
	        Role::create([
	        	'user_id' => $user->id, 
	        	'trole_id' => 3, 
	        ]);
    	}
        // if(env('APP_ENV') == 'testing'){
        // }else{
        // 	$users = User::where('id','>', 4)->get();
        // 	foreach ($users as $user) {
		      //   Role::create([
		      //   	'user_id' => $user->id, 
		      //   	'trole_id' => 3, 
		      //   ]);
        // 	}
        // }        
    }
}
