<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class A00_RoutesTest extends TestCase
{
    use DatabaseMigrations;

    /**     * @test      */
    public function a_user_can_access_to_login()
    {
        $this->get('/')
            ->assertStatus(302);
            // ->assertViewIs('welcome');
    }

}
