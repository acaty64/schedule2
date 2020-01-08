<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_guest_user_can_access_web_routes()
    {
        $response = $this->get('web/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Web');
    } 
    /** @test */
    public function a_guest_user_can_not_access_doc_routes()
    {
        $response = $this->get('doc/tests');
        $response->assertStatus(302)
            ->assertRedirect(route('login'));
    } 

    /** @test */
    public function a_doc_user_can_access_doc_routes()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);

        $response = $this->get('doc/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Docente');
    } 
    /** @test */
    public function a_doc_user_can_access_web_routes()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);

        $response = $this->get('web/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Web');
    } 
    /** @test */
    public function a_doc_user_can_not_access_admin_routes()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);
        $response = $this->get('admin/tests');
        $response->assertStatus(302)
            ->assertRedirect(route('login'));
    } 

    /** @test */
    public function an_admin_user_can_access_admin_routes()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $response = $this->get('admin/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Administrador');
    } 
    /** @test */
    public function an_admin_user_can_access_doc_routes()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $response = $this->get('doc/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Docente');
    } 
    /** @test */
    public function an_admin_user_can_access_web_routes()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $response = $this->get('web/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Web');
    } 
    /** @test */
    public function an_admin_user_can_not_access_master_routes()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);
        $response = $this->get('master/tests');
        $response->assertStatus(302)
            ->assertRedirect(route('login'));
    } 

    /** @test */
    public function a_master_user_can_access_master_routes()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $response = $this->get('master/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Master');
    } 
    /** @test */
    public function a_master_user_can_access_admin_routes()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $response = $this->get('admin/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Administrador');
    } 
    /** @test */
    public function a_master_user_can_access_doc_routes()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $response = $this->get('doc/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Docente');
    } 
    /** @test */
    public function a_master_user_can_access_web_routes()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $response = $this->get('web/tests');
        $response->assertStatus(200)
            ->assertViewIs('tests')
            ->assertSee('Testing access: Web');
    } 

}


