<?php

namespace Tests\Unit;

use App\Derecho;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class A01_AuthorizationTest extends TestCase
{
    use DatabaseMigrations;

    /**     * @test      */
    public function an_admin_can_access_to_create_derechos()
    {
        $user = $this->defaultUser([],'admin');
        $this->actingAs($user)
            ->get('/derecho/create')
            ->assertStatus(200)
            ->assertViewIs('app.derechos.create');
    }

    /**     * @test      */
    public function an_admin_can_access_to_edit_derechos()
    {
        // Given
        $user = $this->defaultUser([],'admin');
        $doc = User::create([
            'email' => 'jdoe@gmail.com',
            'name' => 'John Doe'
        ]);
        $derechos = Derecho::create([
                'cdocente'=>'900000',
                'periodo'=>'2018-2019',
                'dias'=>60
        ]);
        $this->actingAs($user)
            ->get('/derecho/edit/'.$user->id.'/1')
            ->assertStatus(200)
            ->assertViewIs('app.derechos.edit');
    }





}
