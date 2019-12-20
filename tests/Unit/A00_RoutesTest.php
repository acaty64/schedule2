<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class A00_RoutesTest extends TestCase
{
    use DatabaseMigrations;

    /**     * @test      */
    public function a_user_can_access_to_welcome()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('welcome');
    }

    /**     * @test      */
    public function an_authorized_user_can_access_to_home()
    {
        $user = $this->defaultUser();
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


}
