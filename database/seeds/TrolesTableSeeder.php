<?php

use App\Trole;
use Illuminate\Database\Seeder;

class TrolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trole::create(['name'=>'Master', 'acronym'=>'master']);
        Trole::create(['name'=>'Administrador', 'acronym'=>'admin']);
        Trole::create(['name'=>'Docente', 'acronym'=>'doc']);
        Trole::create(['name'=>'Consulta', 'acronym'=>'cons']);
    }
}
