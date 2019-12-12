<?php

namespace Tests\Unit;

use App\DataUser;
use App\Gozada;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CRUD06_GozadasTest extends TestCase
{
  use DatabaseMigrations;

    /**
     * @test
     */
    public function createStoreGozadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
      $response = $this->get('gozada/create');
      $response->assertStatus(200);

      $data = [
        'docente_id'=>$user->first()->id,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'observaciones' => 'prueba'
      ];

      $response = $this->post('/gozada/store', $data);
      $response->assertStatus(302);
      $this->assertDatabaseHas('gozadas', [
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
        'observaciones' => 'prueba'
      ]);
    }

    /**
     * @test
     */
    public function readGozadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);      
      $gozada1 = Gozada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
      ]);
      $gozada2 = Gozada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
      ]);

      $response = $this->get('gozada/read/'.$user->first()->id);
      $response->assertStatus(200);

      $response->assertSeeText($gozada1['fecha_ini']);
      $response->assertSeeText($gozada2['fecha_ini']);
    }

    /**
     * @test
     */
    public function editUpdateGozadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);  
      $gozada1 = Gozada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
      ]);
      $gozada2 = Gozada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
      ]);

      $response = $this->get('gozada/edit/1/2');
      $response->assertStatus(200);

      $value1 = $gozada1->fecha_ini;
      $value2 = $gozada2->fecha_ini;
      $response->assertDontSee($value1);
      $response->assertSee($value2);

      $data = [
        'id' => 2,
        'docente_id'=>1,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '01/12/2019')->format('Y-m-d'),
        'observaciones' => 'prueba'
      ];

      $response = $this->post('gozada/update', $data);
      $response->assertStatus(302);

      $this->assertDatabaseHas('gozadas',[
        'id' => 2,
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '01/12/2019')->format('Y-m-d'),
        'observaciones' => 'prueba'
      ]);
    }

    /**
     * @test
     */
    public function deleteGozadasTest()
    {
      $user = factory(\App\User::class,1)->create();
      factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
      $gozada1 = Gozada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2018')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2018')->format('Y-m-d'),
      ]);
      $gozada2 = Gozada::create([
        'cdocente'=>$user->first()->cdocente,
        'fecha_ini'=>date_create_from_format('d/m/Y', '01/01/2019')->format('Y-m-d'),
        'fecha_fin'=>date_create_from_format('d/m/Y', '31/12/2019')->format('Y-m-d'),
      ]);

      $response = $this->get('gozada/destroy/1/2');
      $response->assertStatus(302);

      $this->assertDatabaseMissing('gozadas',[
        'id' => $gozada2->id,
        'fecha_ini' => $gozada2->fecha_ini,
        'fecha_fin' => $gozada2->fecha_fin,
      ]);
    }
  }
