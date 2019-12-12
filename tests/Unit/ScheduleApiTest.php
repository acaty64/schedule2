<?php

namespace Tests\Unit;

use App\DataUser;
use App\Derecho;
use App\Feriado;
use App\Horario;
use App\Periodo;
use App\Programada;
use App\Semestre;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleApiTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function indexDataTest()
    {
        $user = User::create([
        	'name' =>'JHON DOE',
        	'email' =>'jdoe@gmail.com',
        	'password' =>bcrypt('secret'),
        	// 'cdocente' =>'000000'
        ]);
        $datauser = DataUser::create([
            'user_id' => $user->id,
            'cdocente' => '000000',
            'wdoc1' => 'Uno',
            'wdoc2' => 'Usuario',
            'wdoc3' => 'Master',    
            'cdocente' => '000000',
            'fono1' => '555-555-555',
            'fono2' => '333-333-333',
            'email1' => 'admin@gmail.com',
            'email2' => 'master@gmail.com',
        ]);
        Periodo::create([
        	'cdocente'=>'000000',
        	'periodo'=>'2018-2019',
        	'fecha_ini'=>date_create_from_format('d/m/Y', '01/08/2019'),
            'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019'),
            'status' => true       	
        ]);        
        $periodos = Periodo::all()->toArray();

		$this->get('/api/schedule/index')
				->assertStatus(200)
	            ->assertJsonFragment([
		        	'name' =>'JHON DOE',
		        	'email' =>'jdoe@gmail.com',
		        	// 'cdocente' =>'000000',
	            ]);
        
        // $user = DataUser::where('cdocente', '000000')->first()->toArray();
        // $user = User::findOrFail(1)->toArray();
        Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '01/08/2019'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
        $feriados = Feriado::all()->toArray();
        
        Derecho::create([
        	'cdocente'=>'000000',
        	'periodo'=>'2018-2019',
        	'dias'=>60
        ]);
        $derechos = Derecho::all()->toArray();
        
        Programada::create([
        	'cdocente'=>'000000',
        	'periodo'=>'2018-2019',
        	'fecha_ini'=>date_create_from_format('d/m/Y', '15/07/2019'),
        	'fecha_fin'=>date_create_from_format('d/m/Y', '13/08/2019'),
            'paso'=>15,
            'maximo'=>45,
            'type'=>'fixed',
        ]);
        $programadas = Programada::all()->toArray();

        Horario::create([
            'cdocente' => '000000',
            'dia' => 'LUN',
            'turno' => 'noche',
            'semestre' => '2018-2'
        ]);
        Horario::create([
            'cdocente' => '000000',
            'dia' => 'MAR',
            'turno' => 'dia',
            'semestre' => '2018-2'
        ]);
        Horario::create([
            'cdocente' => '000000',
            'dia' => 'MIE',
            'turno' => 'noche',
            'semestre' => '2018-2'
        ]);
        Horario::create([
            'cdocente' => '000000',
            'dia' => 'JUE',
            'turno' => 'dia',
            'semestre' => '2018-2'
        ]);
        Horario::create([
            'cdocente' => '000000',
            'dia' => 'VIE',
            'turno' => 'noche',
            'semestre' => '2018-2'
        ]);
        $horarios = Horario::all()->toArray();
        Semestre::create([
            'semestre' => '2018-2',
            'fecha_ini' => date_create_from_format('d/m/Y', '15/08/2018'),
            'fecha_fin' => date_create_from_format('d/m/Y', '15/12/2018'),
            'status' => true
        ]);
        $semestres = Semestre::all()->toArray();

		$response = $this->get('/api/schedule/data/' . $user->id);
		$response->assertStatus(200)
            ->assertJson([
                'docente' => [
                    'id'=>$user->id, 
                    'cdocente'=>$user->cdocente,
                    'wdocente'=>$user->wdocente
                ],
                'periodos' => $periodos,
                'programadas' => $programadas,
                'feriados' => $feriados,
                'horarios' => $horarios, 
                'semestres' => $semestres,
                'derechos' => $derechos,
                'semestre' => '2019-2'  
            ]);

    }
}
