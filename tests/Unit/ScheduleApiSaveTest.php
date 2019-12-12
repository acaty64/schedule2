<?php

namespace Tests\Unit;

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

class ScheduleApiSaveTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function saveDataTest()
    {

        $data = [
            'docente' => [
                'cdocente' => '000000'
            ],
            'fini' => date('Y-m-d 00:00:00'),
            'ffin' => date('Y-m-d 00:00:00'),
            'programadas' =>[ 
                [
                    'fecha_ini' => date('Y-m-d 00:00:00'),
                    'fecha_fin' => date('Y-m-d 00:00:00'),
                    'paso' => 1,
                    'maximo' => 7,
                    'type' => 'new'
                ],
                [
                    'fecha_ini' => date('Y-m-d 00:00:00'),
                    'fecha_fin' => date('Y-m-d 00:00:00'),
                    'paso' => 1,
                    'maximo' => 7,
                    'type' => 'new'
                ],
            ],
            'horarios' => [
                [                
                    'semestre' => '2019-2',
                    'dia' => 'LUN',
                    'turno' => 'dia'
                ],
                [                
                    'semestre' => '2019-2',
                    'dia' => 'MAR',
                    'turno' => 'dia'
                ]
            ]
        ];
		$response = $this->post('/api/schedule/save', $data);
		$response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

    }
}
