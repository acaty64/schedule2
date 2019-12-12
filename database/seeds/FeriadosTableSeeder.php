<?php

use App\Feriado;
use Illuminate\Database\Seeder;

class FeriadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '30/08/2019'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '08/10/2019'),
          'wferiado' => 'Combate de Angamos',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '01/11/2019'),
          'wferiado' => 'Dia de Todos los Santos',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '08/12/2019'),
          'wferiado' => 'Inmaculada Concepcion',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '24/12/2019'),
          'wferiado' => 'Navidad',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '25/12/2019'),
          'wferiado' => 'Navidad',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '31/12/2019'),
          'wferiado' => 'Año Nuevo',
        ]);
    }
}
