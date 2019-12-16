<?php

use App\DataUser;
use App\User;
use Illuminate\Database\Seeder;

class DataUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataUser::create([
            // 'user_id' => 1,
            'wdoc1' => 'Uno',
            'wdoc2' => 'Usuario',
            'wdoc3' => 'Master',    
            'cdocente' => '900000',
            'fono1' => '555-555-555',
            'fono2' => '333-333-333',
            'email1' => 'ucss.fcec.lim@gmail.com',
            'email2' => 'admin@gmail.com',
            // 'whatsapp' => false
            ]);

DataUser::create(['wdoc1' => 'AQUISSE TORRES, TEODORO','email1' => 'taquisse@ucss.edu.pe', 'cdocente' => '000566']);
DataUser::create(['wdoc1' => 'ARASHIRO TAMASHIRO, ANA CECILIA','email1' => 'aarashiro@ucss.edu.pe', 'cdocente' => '000152']);

DataUser::create(['wdoc1' => 'BARNETT GUILLEN, LIDA ESTHER','email1' => 'lbarnett@ucss.edu.pe', 'cdocente' => '000508']);

DataUser::create(['wdoc1' => 'COSTA RODRIGUEZ, JORGE EDUARDO','email1' => 'jcosta@ucss.edu.pe', 'cdocente' => '000728']);
DataUser::create(['wdoc1' => 'FLORES BALLESTEROS, TEODORO EMILIO','email1' => 'eflores@ucss.edu.pe', 'cdocente' => '000590']);
DataUser::create(['wdoc1' => 'GARCIA REGAL, RAUL FRANCISCO','email1' => 'rgarcia@ucss.edu.pe', 'cdocente' => '000474']);

DataUser::create(['wdoc1' => 'MANRIQUE PINO, OSCAR','email1' => 'omanrique@ucss.edu.pe', 'cdocente' => '000253']);
DataUser::create(['wdoc1' => 'MAZA CHUMPITAZ, ANGELA GIOVANA','email1' => 'amaza@ucss.edu.pe', 'cdocente' => '000620']);
DataUser::create(['wdoc1' => 'MEDINA SIRLOPU, MARTHA','email1' => 'mmedina@ucss.edu.pe', 'cdocente' => '000113']);

DataUser::create(['wdoc1' => 'MONTERROSO CORONADO, CESAR ANTONIO','email1' => 'amonterroso@ucss.edu.pe', 'cdocente' => '000285']);
DataUser::create(['wdoc1' => 'MUÑOZ MARTICORENA, WILLIAM AMADEO','email1' => 'wmunoz@ucss.edu.pe', 'cdocente' => '000007']);
DataUser::create(['wdoc1' => 'QUEZADA MURGA, DANIEL','email1' => 'dquezada@ucss.edu.pe', 'cdocente' => '000191']);
DataUser::create(['wdoc1' => 'RIVERA ROMERO, DAVID SOSIMO','email1' => 'drivera@ucss.edu.pe', 'cdocente' => '000201']);
DataUser::create(['wdoc1' => 'SEMINARIO OLORTIGUE, PABLO HUGO','email1' => 'pseminario@ucss.edu.pe', 'cdocente' => '000242']);
DataUser::create(['wdoc1' => 'TENORIO MENDEZ, WALTER ORLANDO','email1' => 'otenorio@ucss.edu.pe', 'cdocente' => '000241']);
DataUser::create(['wdoc1' => 'VELASQUEZ RODRIGUEZ, NORMA CONSTANZA','email1' => 'nvelasquez@ucss.edu.pe', 'cdocente' => '000441']);
DataUser::create(['wdoc1' => 'ZARATE HERMOZA, JESUS ROBERTO','email1' => 'jzarate@ucss.edu.pe', 'cdocente' => '000645']);

        $datausers = DataUser::all();
        foreach($datausers as $item){
            $email = $item->email1;
            $user = User::where('email', $email)->first();
            if(!$user){
                dd('Error');
            }
            $item->user_id = $user->id;
            $item->save();
        }

    }
}
