<?php

namespace Tests\Unit;

use App\DataUser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class A01_ScheduleTest extends TestCase
{
    use DatabaseMigrations;

    /**     * @test      */
    public function view_report()
    {
        $this->seed('DatabaseSeeder');
        $user_id = DataUser::first()->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/report/show/'.$user_id)
        ->assertSee('Docente: ' . $user->name);
    }
    /**     * @test      */
    public function view_cronograma()
    {
        $this->seed('DatabaseSeeder');
        $user_id = DataUser::first()->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/crono/show/'.$user_id)
            ->assertSee('Cronograma del docente: ')
            ->assertSee($user->name);
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
