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
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

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
            'cdocente' => $auth->cdocente,
            'change' => 'Create Derechos',
            'user_change' => $auth->id
        ]);
    }

    /**
     * @test
     */
    public function readDerechosTest()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');

        $derecho1 = Derecho::create([
            'cdocente'=>$doc->cdocente,
            'periodo'=>'2017-2018',
            'dias'=>30
        ]);
        $derecho2 = Derecho::create([
            'cdocente'=>$doc->cdocente,
            'periodo'=>'2018-2019',
            'dias'=>60
        ]);

        $response = $this->get('derecho/read/'.$doc->id);
        $response->assertStatus(200);

        $value = $doc->wdocente;
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
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');

        $derecho1 = Derecho::create([
            'cdocente'=>$doc->cdocente,
            'periodo'=>'2017-2018',
            'dias'=>30
        ]);
        $derecho2 = Derecho::create([
            'cdocente'=>$doc->cdocente,
            'periodo'=>'2018-2019',
            'dias'=>60
        ]);

        $response = $this->get('derecho/edit/'.$doc->id.'/'.$derecho2->id);
        $response->assertStatus(200);

        $value = $doc->wdocente;
        $response->assertSeeText(e($value));

        $value1 = $derecho1->periodo;
        $value2 = $derecho2->periodo;
        $response->assertDontSee($value1);
        $response->assertSee($value2);

        $data = [
            'id' => 2,
            'cdocente' => $doc->cdocente,
            'periodo' => '2019-2020',
            'dias' => 10
        ];

        $this->actingAs($auth);
        $response = $this->post('derecho/update', $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('derechos',[
            'id' => 2,
            'cdocente' => $data['cdocente'],
            'periodo' => $data['periodo'],
            'dias' => $data['dias'],
        ]);

        $this->assertDatabaseHas('traces',[
            'cdocente' => $doc->cdocente,
            'change' => 'Update Derechos',
            'user_change' => $auth->id
        ]);
    }

    /**
     * @test
     */
    public function deleteDerechosTest()
    {

        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');

        $derecho1 = Derecho::create([
            'cdocente'=>$doc->cdocente,
            'periodo'=>'2017-2018',
            'dias'=>30
        ]);
        $derecho2 = Derecho::create([
            'cdocente'=>$doc->cdocente,
            'periodo'=>'2018-2019',
            'dias'=>60
        ]);

        $this->actingAs($auth);
        $response = $this->get('derecho/destroy/'.$doc->id.'/'.$derecho2->id);
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
            'user_change' => $auth->id
        ]);
    }
}
