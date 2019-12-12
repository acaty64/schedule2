<?php

namespace Tests\Unit;

use App\DataUser;
use App\Horario;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CRUD03_HorariosTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function createStoreHorariosTest()
    {
        $user = factory(\App\User::class,1)->create();
        factory(\App\DataUser::class,1)->create(['user_id'=>$user->first()->id]);
        $response = $this->get('horario/create');
        $response->assertStatus(200);

        $data = [
            'docente' => 1,
            'semestre' => '2019-2',
            'LUN' => 'dia',
            'MAR' => 'dia',
            'MIE' => 'dia',
            'JUE' => 'dia',
            'VIE' => 'dia',
            'SAB' => 'dia',
        ];
		$response = $this->post('/horario/store', $data);
		$response->assertStatus(302);
        $cdocente = User::findOrFail(1)->cdocente;

        $this->assertDatabaseHas('horarios',
            [ 
                'cdocente'=>$cdocente,
                'semestre'=>'2019-2',
                'dia'=>'LUN', 
                'turno'=>$data['LUN']
            ]);
        $this->assertDatabaseHas('horarios',
            [ 
                'cdocente'=>$cdocente,
                'semestre'=>'2019-2', 
                'dia'=>'MAR', 
                'turno'=>$data['MAR']
            ]);
        $this->assertDatabaseHas('horarios',
            [ 
                'cdocente'=>$cdocente,
                'semestre'=>'2019-2', 
                'dia'=>'MIE', 
                'turno'=>$data['MIE']
            ]);
        $this->assertDatabaseHas('horarios',
            [ 
                'cdocente'=>$cdocente,
                'semestre'=>'2019-2', 
                'dia'=>'JUE', 
                'turno'=>$data['JUE']
            ]);
        $this->assertDatabaseHas('horarios',
            [ 
                'cdocente'=>$cdocente,
                'semestre'=>'2019-2', 
                'dia'=>'VIE', 
                'turno'=>$data['VIE']
            ]);
        $this->assertDatabaseHas('horarios',
            [ 
                'cdocente'=>$cdocente,
                'semestre'=>'2019-2', 
                'dia'=>'SAB', 
                'turno'=>$data['SAB']
            ]);
    }

    /**
     * @test
     */
    public function readHorariosTest()
    {
        factory(\App\User::class,1)->create();
        
        $user = User::findOrFail(1);
        $datauser = DataUser::create([
            'user_id' => 1,
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

        $horario1 = Horario::create([
            'cdocente'=>$datauser->cdocente,
            'semestre'=>'2019-2',
            'dia'=>'LUN',
            'turno'=>'dia'
        ]);
        $horario2 = Horario::create([
            'cdocente'=>$datauser->cdocente,
            'semestre'=>'2019-2',
            'dia'=>'MAR',
            'turno'=>'noche'
        ]);

        $response = $this->get('horario/read/1');
        $response->assertStatus(200);

        $value = $user->wdocente;
        $response->assertSeeText($value);

        $value1 = $horario1->turno;
        $value2 = $horario2->turno;
        $response->assertSee($value1);
        $response->assertSee($value2);
    }

    /**
     * @test
     */
    public function editUpdateHorariosTest()
    {
        factory(\App\User::class,1)->create();
        
        $user = User::findOrFail(1);
        $datauser = DataUser::create([
            'user_id' => 1,
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

        $horario1 = Horario::create([
            'cdocente'=>$datauser->cdocente,
            'semestre'=>'2019-2',
            'dia'=>'LUN',
            'turno'=>'dia'
        ]);
        $horario2 = Horario::create([
            'cdocente'=>$datauser->cdocente,
            'semestre'=>'2019-2',
            'dia'=>'MAR',
            'turno'=>'noche'
        ]);

        $response = $this->get('horario/edit/1/2019-2');
        $response->assertStatus(200);

        $value = $user->wdocente;
        $response->assertSeeText($value);

        $value1 = $horario1->turno;
        $value2 = $horario2->turno;
        $response->assertSee($value1);
        $response->assertSee($value2);

        $data = [
            'docente_id' => 1,
            'cdocente' => $datauser->cdocente,
            'semestre'=>'2019-2',
            'LUN' => 'noche',
            'MAR' => 'dia',
            'MIE' => 'vacaciones',
            'JUE' => 'libre',
            'VIE' => 'dia',
            'SAB' => 'noche',
        ];

        $response = $this->post('horario/update', $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('horarios',[
            'id' => 1,
            'cdocente' => $data['cdocente'],
            'semestre'=>'2019-2',
            'dia'=>'LUN',
            'turno'=>'noche'
        ]);
        $this->assertDatabaseHas('horarios',[
            'id' => 2,
            'cdocente' => $data['cdocente'],
            'semestre'=>'2019-2',
            'dia'=>'MAR',
            'turno'=>'dia'
        ]);
        $this->assertDatabaseHas('horarios',[
            'cdocente' => $data['cdocente'],
            'semestre'=>'2019-2',
            'dia'=>'MIE',
            'turno'=>'vacaciones'
        ]);
        $this->assertDatabaseMissing('horarios',[
            'cdocente' => $data['cdocente'],
            'semestre'=>'2019-2',
            'dia'=>'JUE',
        ]);
        $this->assertDatabaseHas('horarios',[
            'cdocente' => $data['cdocente'],
            'semestre'=>'2019-2',
            'dia'=>'VIE',
            'turno'=>'dia'
        ]);
        $this->assertDatabaseHas('horarios',[
            'cdocente' => $data['cdocente'],
            'semestre'=>'2019-2',
            'dia'=>'SAB',
            'turno'=>'noche'
        ]);
    }

    /**
     * @test
     */
    public function deleteHorariosTest()
    {
        factory(\App\User::class,1)->create();
        
        $user = User::findOrFail(1);
        $datauser = DataUser::create([
            'user_id' => 1,
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

        $horario1 = Horario::create([
            'cdocente'=>$datauser->cdocente,
            'semestre'=>'2019-2',
            'dia'=>'LUN',
            'turno'=>'dia'
        ]);
        $horario2 = Horario::create([
            'cdocente'=>$datauser->cdocente,
            'semestre'=>'2019-2',
            'dia'=>'MAR',
            'turno'=>'noche'
        ]);

        $response = $this->get('horario/destroy/1/2019-2');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('horarios',[
            'id' => $horario1->id,
            'cdocente'=>$datauser->cdocente,
            'semestre'=>$horario1->semestre,
            'dia'=>$horario1->dia,
            'turno'=>$horario1->turno
        ]);
        $this->assertDatabaseMissing('horarios',[
            'id' => $horario2->id,
            'cdocente'=>$datauser->cdocente,
            'semestre'=>$horario2->semestre,
            'dia'=>$horario2->dia,
            'turno'=>$horario2->turno
        ]);
    }
}
