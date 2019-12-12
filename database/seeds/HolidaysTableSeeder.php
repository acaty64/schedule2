<?php

use App\Holiday;
use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Holiday::create([
        	'dd' => 1,
        	'mm' => 1,
        	'wferiado' => 'Año Nuevo',
        ]);
        Holiday::create([
        	'dd' => 1,
        	'mm' => 5,
        	'wferiado' => 'Día del Trabajo',
        ]);
        Holiday::create([
        	'dd' => 29,
        	'mm' => 6,
        	'wferiado' => 'San Pedro y San Pablo',
        ]);
        Holiday::create([
        	'dd' => 28,
        	'mm' => 7,
        	'wferiado' => 'Fiestas Patrias',
        ]);
        Holiday::create([
        	'dd' => 29,
        	'mm' => 7,
        	'wferiado' => 'Fiestas Patrias',
        ]);
        Holiday::create([
        	'dd' => 30,
        	'mm' => 8,
        	'wferiado' => 'Santa Rosa de Lima',
        ]);
        Holiday::create([
        	'dd' => 8,
        	'mm' => 10,
        	'wferiado' => 'Combate Naval de Angamos',
        ]);
        Holiday::create([
        	'dd' => 1,
        	'mm' => 11,
        	'wferiado' => 'Día de Todos los Santos',
        ]);
        Holiday::create([
        	'dd' => 24,
        	'mm' => 12,
        	'wferiado' => 'Navidad',
        ]);
        Holiday::create([
        	'dd' => 25,
        	'mm' => 12,
        	'wferiado' => 'Navidad',
        ]);
        Holiday::create([
        	'dd' => 31,
        	'mm' => 12,
        	'wferiado' => 'Año Nuevo',
        ]);
    }
}

