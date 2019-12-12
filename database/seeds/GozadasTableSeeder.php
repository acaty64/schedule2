<?php

use App\Gozada;
use Illuminate\Database\Seeder;

class GozadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gozada::create([
        	'cdocente'=>'900000',
        	// 'periodo'=>'2018-2019',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '05/07/2018'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '10/07/2018'),
        ]);
        Gozada::create([
            'cdocente'=>'900000',
            // 'periodo'=>'2018-2019',
            'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '14/08/2019'),
            'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/08/2019'),
        ]);
    }
}
