<?php

namespace Tests\Unit;

use App\DataUser;
use App\Programada;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CRUD05_ProgramadasTest extends TestCase
{
  use DatabaseMigrations;

    /**
     * @test
     */
    public function createStoreProgramadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
      $response = $this->get('programada/create');
      $response->assertStatus(200);

      $data = [
        'docente_id'=>$user->first()->id,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ];

      $response = $this->post('/programada/store', $data);
      $response->assertStatus(302);
      $this->assertDatabaseHas('programadas', [
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);
    }

    /**
     * @test
     */
    public function readProgramadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);      
      $programada1 = Programada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);
      $programada2 = Programada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);

      $response = $this->get('programada/read/'.$user->first()->id);
      $response->assertStatus(200);

      $response->assertSeeText($programada1['fecha_ini']);
      $response->assertSeeText($programada2['fecha_ini']);
    }

    /**
     * @test
     */
    public function editUpdateProgramadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);  
      $programada1 = Programada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);
      $programada2 = Programada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);

      $response = $this->get('programada/edit/1/2');
      $response->assertStatus(200);

      $value1 = $programada1->fecha_ini;
      $value2 = $programada2->fecha_ini;
      $response->assertDontSee($value1);
      $response->assertSee($value2);

      $data = [
        'id' => 2,
        'docente_id'=>1,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '01/12/2019')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ];

      $response = $this->post('programada/update', $data);
      $response->assertStatus(302);

      $this->assertDatabaseHas('programadas',[
        'id' => 2,
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '01/12/2019')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);
    }

    /**
     * @test
     */
    public function deleteProgramadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
      $programada1 = Programada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);
      $programada2 = Programada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);

      $response = $this->get('programada/destroy/1/2');
      $response->assertStatus(302);

      $this->assertDatabaseMissing('programadas',[
        'id' => $programada2->id,
        'fecha_ini' => $programada2->fecha_ini,
        'fecha_fin' => $programada2->fecha_fin,
        'paso'=>1,
        'maximo'=>15,
        'type' => 'fixed'
      ]);
    }
  }
