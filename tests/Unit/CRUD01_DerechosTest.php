<?php

namespace Tests\Unit;

use App\DataUser;
use App\Derecho;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CRUD01_DerechosTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function createStoreDerechosTest()
    {
        $user = factory(\App\User::class,1)->create();
        $datauser = factory(DataUser::class,1)->create(['user_id'=>$user->first()->id]);

        $this->actingAs($user->first());

        $response = $this->get('derecho/create');
        $response->assertStatus(200);

        $data = [
            'docente' =>  1,
            'periodo' => '2020-2021',
            'dias' => 60
        ];
		$response = $this->post('/derecho/store', $data);
		$response->assertStatus(302);

        $this->assertDatabaseHas('derechos',[
            'periodo' => $data['periodo'],
            'dias' => $data['dias'],
        ]);

        $this->assertDatabaseHas('traces',[
            'cdocente' => $user->first()->cdocente,
            'change' => 'Create Derechos',
            'user_change' => $user->first()->id
        ]);
    }

    /**
     * @test
     */
    public function readDerechosTest()
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

        $derecho1 = Derecho::create([
            'cdocente'=>$datauser->cdocente,
            'periodo'=>'2017-2018',
            'dias'=>30
        ]);
        $derecho2 = Derecho::create([
            'cdocente'=>$datauser->cdocente,
            'periodo'=>'2018-2019',
            'dias'=>60
        ]);

        $response = $this->get('derecho/read/1');
        $response->assertStatus(200);

        $value = $user->wdocente;
        $response->assertSeeText($value);

        $value1 = $derecho1->periodo;
        $value2 = $derecho2->periodo;
        $response->assertSee($value1);
        $response->assertSee($value2);
    }

    /**
     * @test
     */
    public function editUpdateDerechosTest()
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

        $derecho1 = Derecho::create([
            'cdocente'=>$datauser->cdocente,
            'periodo'=>'2017-2018',
            'dias'=>30
        ]);
        $derecho2 = Derecho::create([
            'cdocente'=>$datauser->cdocente,
            'periodo'=>'2018-2019',
            'dias'=>60
        ]);

        $response = $this->get('derecho/edit/1/2');
        $response->assertStatus(200);

        $value = $user->wdocente;
        $response->assertSeeText($value);

        $value1 = $derecho1->periodo;
        $value2 = $derecho2->periodo;
        $response->assertDontSee($value1);
        $response->assertSee($value2);

        $data = [
            'id' => 2,
            'cdocente' => $datauser->cdocente,
            'periodo' => '2019-2020',
            'dias' => 10
        ];

        $this->actingAs($user);
        $response = $this->post('derecho/update', $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('derechos',[
            'id' => 2,
            'cdocente' => $data['cdocente'],
            'periodo' => $data['periodo'],
            'dias' => $data['dias'],
        ]);

        $this->assertDatabaseHas('traces',[
            'cdocente' => $user->cdocente,
            'change' => 'Update Derechos',
            'user_change' => $user->id
        ]);
    }

    /**
     * @test
     */
    public function deleteDerechosTest()
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

        $derecho1 = Derecho::create([
            'cdocente'=>$datauser->cdocente,
            'periodo'=>'2017-2018',
            'dias'=>30
        ]);
        $derecho2 = Derecho::create([
            'cdocente'=>$datauser->cdocente,
            'periodo'=>'2018-2019',
            'dias'=>60
        ]);

        $this->actingAs($user);
        $response = $this->get('derecho/destroy/1/2');
        $response->assertStatus(302);

        $value1 = $derecho1->periodo;
        $value2 = $derecho2->periodo;

        $this->assertDatabaseMissing('derechos',[
            'id' => $derecho2->cdocente,
            'cdocente' => $derecho2->cdocente,
            'periodo' => $derecho2->periodo,
            'dias' => $derecho2->dias,
        ]);

        $this->assertDatabaseHas('traces',[
            'cdocente' => $derecho2->cdocente,
            'change' => 'Delete Derechos',
            'user_change' => $user->id
        ]);
    }
}
