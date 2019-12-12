<?php

namespace Tests\Unit;

use App\DataUser;
use App\Derecho;
use App\Periodo;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CRUD04_PeriodosTest extends TestCase
{
  use DatabaseMigrations;

    /**
     * @test
     */
    public function createStorePeriodosTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
      $response = $this->get('periodo/create');
      $response->assertStatus(200);

      $data = [
        'docente_id'=>$user->first()->id,
        'periodo'=>'2017-2018',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'status' => 1
      ];

      $response = $this->post('/periodo/store', $data);
      $response->assertStatus(302);
      $this->assertDatabaseHas('periodos', [
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2017-2018',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'status' => 1
      ]);
    }

    /**
     * @test
     */
    public function readPeriodosTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);      
      $periodo1 = Periodo::create([
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2017-2018',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'status' => 1
      ]);
      $periodo2 = Periodo::create([
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2018-2019',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
        'status' => 1
      ]);

      $response = $this->get('periodo/read/'.$user->first()->id);
      $response->assertStatus(200);

      $response->assertSeeText($periodo1['periodo']);
      $response->assertSeeText($periodo2['periodo']);
    }

    /**
     * @test
     */
    public function editUpdatePeriodosTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);  
      $periodo1 = Periodo::create([
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2017-2018',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'status' => 1
      ]);
      $periodo2 = Periodo::create([
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2018-2019',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
        'status' => 1
      ]);

      $response = $this->get('periodo/edit/1/2');
      $response->assertStatus(200);

      $value1 = $periodo1->periodo;
      $value2 = $periodo2->periodo;
      $response->assertDontSee($value1);
      $response->assertSee($value2);

      $data = [
        'id' => 2,
        'docente_id'=>1,
        'periodo'=>'2018-2019',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '01/12/2019')->format('Y-m-d'),
        'status' => 1
      ];

      $response = $this->post('periodo/update', $data);
      $response->assertStatus(302);

      $this->assertDatabaseHas('periodos',[
        'id' => 2,
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2018-2019',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '01/12/2019')->format('Y-m-d'),
        'status' => 1
      ]);
    }

    /**
     * @test
     */
    public function deletePeriodosTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
      $periodo1 = Periodo::create([
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2017-2018',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'status' => 1
      ]);
      $periodo2 = Periodo::create([
        'cdocente'=>$user->first()->cdocente,
        'periodo'=>'2018-2019',
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
        'status' => 1
      ]);

      $response = $this->get('periodo/destroy/1/2');
      $response->assertStatus(302);

      $this->assertDatabaseMissing('periodos',[
        'id' => $periodo2->id,
        'periodo' => $periodo2->periodo,
        'fecha_ini' => $periodo2->fecha_ini,
        'fecha_fin' => $periodo2->fecha_fin,
        'status' => $periodo2->status,
      ]);
    }
  }
