<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfirmTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function it_doc_confirm_schedule()
    {
        $this->seed();

        $user_id = Role::where('trole_id', 4)->first()->user_id;

        $user = User::findOrFail($user_id);

        // $this->get('/api/schedule/confirm/');

$this->MarkTestIncomplete();

        $this->assertDatabaseHas('users', $user->toArray());



    }
}
