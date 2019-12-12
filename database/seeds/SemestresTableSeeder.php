<?php

use App\Semestre;
use Illuminate\Database\Seeder;

class SemestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semestre::create([
            'semestre' => '2019-1',
            'fecha_ini' => DateTime::createFromFormat('d/m/Y', '11/03/2019'),
            'fecha_fin' => DateTime::createFromFormat('d/m/Y', '13/07/2019'),
            'status' => false 
        ]);
        Semestre::create([
        	'semestre' => '2019-04',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '17/07/2019'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '15/08/2019'),
        	'status' => false 
        ]);
        Semestre::create([
        	'semestre' => '2019-2',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '21/08/2019'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '18/12/2019'),
        	'status' => true 
        ]);
        Semestre::create([
        	'semestre' => '2020-01',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '08/01/2020'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '08/02/2020'),
        	'status' => true 
        ]);
        Semestre::create([
        	'semestre' => '2020-02',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '10/02/2020'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '12/03/2020'),
        	'status' => true 
        ]);
        Semestre::create([
        	'semestre' => '2020-1',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '16/03/2020'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '15/07/2020'),
        	'status' => true 
        ]);
        Semestre::create([
        	'semestre' => '2020-03',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '20/07/2020'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '19/08/2020'),
        	'status' => true 
        ]);
        Semestre::create([
        	'semestre' => '2020-2',
        	'fecha_ini' => DateTime::createFromFormat('d/m/Y', '24/08/2020'),
        	'fecha_fin' => DateTime::createFromFormat('d/m/Y', '18/12/2020'),
        	'status' => true 
        ]);
    }
}
