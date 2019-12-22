<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PruebaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function testPrueba()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $response = $this->get('derecho/create');
        $response->assertStatus(200);

    } 
}
