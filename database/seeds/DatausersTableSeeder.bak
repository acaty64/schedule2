<?php

use App\DataUser;
use App\User;
use Illuminate\Database\Seeder;

class DatausersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataUser::create([
            'user_id' => 1,
            'wdoc1' => 'Uno',
            'wdoc2' => 'Usuario',
            'wdoc3' => 'Master',    
            'cdocente' => '900000',
            'fono1' => '555-555-555',
            'fono2' => '333-333-333',
            'email1' => 'admin@gmail.com',
            'email2' => 'master@gmail.com',
            // 'whatsapp' => false
            ]);

        $users = User::where('id','>',1)->get();
        foreach ($users as $user) {
            $pos = strpos($user->name, ' ');

            $wdoc1 = substr ( $user->name , 0 , $pos );
            $wdoc2 = substr ( $user->name , $pos );
            $wdoc3 = $wdoc2;

            factory(App\DataUser::class)->create([
                    'user_id' => $user->id,
                    'cdocente' => str_pad($user->id, 6, '0', STR_PAD_LEFT),
                    'wdoc1' => $wdoc1,
                    'wdoc2' => $wdoc2,
                    'wdoc3' => $wdoc3,    
                    'email1' => $user->email,
                ]);    
        }
    }
}
