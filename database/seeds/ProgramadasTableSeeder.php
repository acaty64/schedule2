<?php

use App\Programada;
use Illuminate\Database\Seeder;

class ProgramadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Programada::create([
        	'cdocente'=>'900000',
        	// 'periodo'=>'2018-2019',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/07/2018'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '01/07/2018'),
            'paso'=>1,
            'maximo'=>15,
            'type' => 'new'
        ]);
        Programada::create([
            'cdocente'=>'900000',
            // 'periodo'=>'2018-2019',
            'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '15/07/2019'),
            'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/08/2019'),
            'minimo' => 7,
            'paso'=>15,
            'maximo'=>30,
            'type' => 'fixed'
        ]);
        Programada::create([
        	'cdocente'=>'900000',
        	// 'periodo'=>'2018-2019',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '16/12/2019'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '29/01/2020'),
            'minimo' => 7,
            'paso'=>15,
            'maximo'=>45,
            'type' => 'fixed'
        ]);
    }
}
