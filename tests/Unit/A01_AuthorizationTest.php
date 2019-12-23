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
    public function an_authorized_user_can_access_to_home()
    {
        $user = $this->defaultUser([], 'doc');
        $this->actingAs($user)
            ->get('/home')
            ->assertStatus(200)
            ->assertViewIs('home');
    }

    /**     * @test      */
    public function an_unauthorized_user_can_not_access_to_home()
    {
        $this->get('/home')
            ->assertStatus(302)
            ->assertRedirect('login');
    }

    /**     * @test      */
    public function an_admin_user_can_access_to_create_derechos()
    {
        $user = $this->defaultUser([],'admin');
        $this->actingAs($user)
            ->get('/')
            ->assertStatus(200);
        $this->get('/derecho/create')
            ->assertStatus(200)
            ->assertViewIs('app.derechos.create');
    }

    public function a_doc_user_cannot_access_to_create_derechos()
    {
        $user = $this->defaultUser([],'doc');
        $this->actingAs($user)
            ->get('/')
            ->assertStatus(200);
        $this->get('/derecho/create')
            ->assertStatus(302)
            ->assertRedirect('home');
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

    /**     * @test      */
    public function a_doc_user_cannot_access_to_edit_derechos()
    {
        // Given
        $user = $this->defaultUser([],'doc');
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
            ->assertStatus(302)
            ->assertRedirect('home');
    }

    /**     * @test      */
    public function an_admin_can_access_to_read_derechos()
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
            ->get('/derecho/read/'.$user->id)
            ->assertStatus(200)
            ->assertViewIs('app.derechos.index');
    }

    /**     * @test      */
    public function a_doc_user_cannot_access_to_read_derechos()
    {
        // Given
        $user = $this->defaultUser([],'doc');
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
            ->get('/derecho/read/'.$user->id)
            ->assertStatus(302)
            ->assertRedirect('home');
    }



}

