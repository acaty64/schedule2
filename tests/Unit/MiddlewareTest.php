<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function testing_isMaster()
    {
        $user = $this->defaultUser([], 'master');
        $this->assertTrue($user->isMaster);
        $this->assertFalse($user->isAdmin);
        $this->assertFalse($user->isDoc);
    } 

    /** @test */
    public function testing_isAdmin()
    {
        $user = $this->defaultUser([], 'admin');
        $this->assertTrue($user->isAdmin);
        $this->assertFalse($user->isMaster);
        $this->assertFalse($user->isDoc);
    } 

    /** @test */
    public function testing_isDoc()
    {
        $user = $this->defaultUser([], 'doc');
        $this->assertTrue($user->isDoc);
        $this->assertFalse($user->isMaster);
        $this->assertFalse($user->isAdmin);
    } 

}
