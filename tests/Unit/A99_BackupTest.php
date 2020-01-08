<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class A99_BackupTest extends TestCase
{

	use DatabaseMigrations;
	
    /** @test */
    public function a_master_user_can_view_index_blade()
    {
        $user = $this->defaultUser([], 'master');
        $this->actingAs($user)
        	->get(route('backup.index'))
        	->assertStatus(200)
        	->assertViewIs('backup.index');
    }

    /** @test */
    public function an_admin_user_can_not_view_index_blade()
    {
        $user = $this->defaultUser([], 'admin');
        $this->actingAs($user)
        	->get(route('backup.index'))
        	->assertStatus(302);
    }

    /** @test */
    // public function a_master_user_can_create_the_backup_files()
    // {
    //     $user = $this->defaultUser([], 'master');
    //     $this->actingAs($user)
    //     	->get(route('backup.index'))
    //     	->assertStatus(200)
    //     	->assertViewIs('backup.index');
    // }
}
