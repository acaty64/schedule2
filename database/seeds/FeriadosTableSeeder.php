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
          'fecha' => DateTime::createFromFormat('d/m/Y', '09/04/2020'),
          'wferiado' => 'Jueves Santo',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '10/04/2020'),
          'wferiado' => 'Viernes Santo',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '11/04/2020'),
          'wferiado' => 'Sábado Santo',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '01/05/2020'),
          'wferiado' => 'Día del Trabajo',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '29/06/2020'),
          'wferiado' => 'San Pedro y San Pablo',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '27/07/2020'),
          'wferiado' => 'Posible puente',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '28/07/2020'),
          'wferiado' => 'Fiestas Patrias',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '29/07/2020'),
          'wferiado' => 'Fiestas Patrias',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '30/08/2020'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '08/10/2020'),
          'wferiado' => 'Combate de Angamos',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '01/11/2020'),
          'wferiado' => 'Dia de Todos los Santos',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '08/12/2020'),
          'wferiado' => 'Inmaculada Concepcion',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '24/12/2020'),
          'wferiado' => 'Navidad',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '25/12/2020'),
          'wferiado' => 'Navidad',
        ]);
        Feriado::create([
          'fecha' => DateTime::createFromFormat('d/m/Y', '31/12/2020'),
          'wferiado' => 'Año Nuevo',
        ]);
    }
}
