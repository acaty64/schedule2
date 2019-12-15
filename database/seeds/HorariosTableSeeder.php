<?php

use App\Horario;
use Illuminate\Database\Seeder;

class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'cdocente' => '900000',
            'semestre' => '2019-2',
            'dia' => 'LUN',
            'turno' => 'dia',
        ]);
        Horario::create([
            'cdocente' => '900000',
            'semestre' => '2019-2',
            'dia' => 'MAR',
            'turno' => 'noche',
        ]);
        Horario::create([
            'cdocente' => '900000',
            'semestre' => '2019-2',
            'dia' => 'MIE',
            'turno' => 'dia',
        ]);
        Horario::create([
            'cdocente' => '900000',
            'semestre' => '2019-2',
            'dia' => 'JUE',
            'turno' => 'noche',
        ]);
        Horario::create([
            'cdocente' => '900000',
            'semestre' => '2019-2',
            'dia' => 'VIE',
            'turno' => 'dia',
        ]);
        Horario::create([
            'cdocente' => '900000',
            'semestre' => '2019-2',
            'dia' => 'SAB',
            'turno' => 'libre',
        ]);

Horario::create(['cdocente' => '000566','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000152','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000508','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000728','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000590','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000474','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000510','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000253','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000620','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000113','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000285','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000007','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000191','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000201','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000242','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000241','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000441','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000645','semestre' => '2020-01','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000566','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000152','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000508','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000728','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000590','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000474','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000510','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000253','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000620','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000113','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000285','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000007','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000191','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000201','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000242','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000241','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000441','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000645','semestre' => '2020-02','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000566','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000152','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000508','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000728','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000590','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000474','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000510','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000253','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000620','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000113','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000285','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000007','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000191','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000201','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000242','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000241','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000441','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000645','semestre' => '2020-1','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000566','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000152','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000508','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000728','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000590','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000474','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000510','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000253','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000620','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000113','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000285','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000007','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000191','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000201','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000242','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000241','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000441','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000645','semestre' => '2020-03','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000566','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000152','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000508','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000728','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000590','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'libre']);
Horario::create(['cdocente' => '000474','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000510','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000253','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000620','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000113','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000285','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000007','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000191','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000201','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000242','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'noche']);
Horario::create(['cdocente' => '000241','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000441','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'dia']);
Horario::create(['cdocente' => '000645','semestre' => '2020-2','dia' => 'LUN', 'turno' => 'libre']);



    }
}
