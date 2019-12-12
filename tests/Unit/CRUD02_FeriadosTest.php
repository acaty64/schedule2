<?php

namespace Tests\Unit;

use App\DataUser;
use App\Derecho;
use App\Feriado;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CRUD02_FeriadosTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function createStoreFeriadosTest()
    {
        $response = $this->get('feriado/create');
        $response->assertStatus(200);

        $data = [
          'fecha' => date_create_from_format('d/m/Y', '30/08/2019'),
          'wferiado' => 'Santa Rosa de Lima',
        ];

		$response = $this->post('/feriado/store', $data);
		$response->assertStatus(302);
        $this->assertDatabaseHas('feriados', [
          'fecha' => date_create_from_format('d/m/Y', '30/08/2019')->format('Y-m-d'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
    }

    /**
     * @test
     */
    public function readFeriadosTest()
    {
        $feriado1 = Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '30/08/2019'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
        $feriado2 = Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '08/10/2019'),
          'wferiado' => 'Combate de Angamos',
        ]);

        $response = $this->get('feriado/read');
        $response->assertStatus(200);

        $response->assertSeeText($feriado1['wferiado']);
        $response->assertSeeText($feriado2['wferiado']);
    }

    /**
     * @test
     */
    public function editUpdateFeriadosTest()
    {
        $feriado1 = Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '30/08/2019')->format('Y-m-d'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
        $feriado2 = Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '08/10/2019')->format('Y-m-d'),
          'wferiado' => 'Combate de Angamos',
        ]);

        $response = $this->get('feriado/edit/2');
        $response->assertStatus(200);

        $value1 = $feriado1->wferiado;
        $value2 = $feriado2->wferiado;
        $response->assertDontSee($value1);
        $response->assertSee($value2);

        $data = [
            'id' => 2,
            'fecha' => $feriado2->fecha,
            'wferiado' => 'Nuevo Texto',
        ];

        $response = $this->post('feriado/update', $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('feriados',[
            'id' => 2,
            'fecha' => $data['fecha'],
            'wferiado' => $data['wferiado'],
        ]);
    }

    /**
     * @test
     */
    public function deleteFeriadosTest()
    {
        $feriado1 = Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '30/08/2019')->format('Y-m-d'),
          'wferiado' => 'Santa Rosa de Lima',
        ]);
        $feriado2 = Feriado::create([
          'fecha' => date_create_from_format('d/m/Y', '08/10/2019')->format('Y-m-d'),
          'wferiado' => 'Combate de Angamos',
        ]);

        $response = $this->get('feriado/destroy/2');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('feriados',[
            'id' => $feriado2->id,
            'fecha' => $feriado2->fecha,
            'wferiado' => $feriado2->wferiado,
        ]);
    }
}
