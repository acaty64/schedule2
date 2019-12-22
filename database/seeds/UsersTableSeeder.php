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
        
        if(env('APP_ENV') != 'testing'){
            
            User::create(['name' => 'AQUISSE TORRES, TEODORO', 'email' => 'taquisse@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'ARASHIRO TAMASHIRO, ANA CECILIA', 'email' => 'aarashiro@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            
            User::create(['name' => 'BARNETT GUILLEN, LIDA ESTHER', 'email' => 'lbarnett@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            
            User::create(['name' => 'COSTA RODRIGUEZ, JORGE EDUARDO', 'email' => 'jcosta@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'FLORES BALLESTEROS, TEODORO EMILIO', 'email' => 'eflores@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'GARCIA REGAL, RAUL FRANCISCO', 'email' => 'rgarcia@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'LOPEZ BRAVO, RODOLFO ODLANIER', 'email' => 'rlopez@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'MANRIQUE PINO, OSCAR', 'email' => 'omanrique@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'MAZA CHUMPITAZ, ANGELA GIOVANA', 'email' => 'amaza@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'MEDINA SIRLOPU, MARTHA', 'email' => 'mmedina@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            
            User::create(['name' => 'MONTERROSO CORONADO, CESAR ANTONIO', 'email' => 'amonterroso@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'MUÑOZ MARTICORENA, WILLIAM AMADEO', 'email' => 'wmunoz@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'QUEZADA MURGA, DANIEL', 'email' => 'dquezada@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'RIVERA ROMERO, DAVID SOSIMO', 'email' => 'drivera@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'SEMINARIO OLORTIGUE, PABLO HUGO', 'email' => 'pseminario@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'TENORIO MENDEZ, WALTER ORLANDO', 'email' => 'otenorio@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'VELASQUEZ RODRIGUEZ, NORMA CONSTANZA', 'email' => 'nvelasquez@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
            User::create(['name' => 'ZARATE HERMOZA, JESUS ROBERTO', 'email' => 'jzarate@ucss.edu.pe', 'password' => bcrypt('secret') ,]);
        }
        
    }
}
