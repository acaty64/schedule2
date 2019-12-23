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

    public function a_master_user_can_view_index()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $this->get('/schedule/index')
            ->assertStatus(200);
    }

    public function an_admin_user_can_view_index()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $this->get('/schedule/index')
            ->assertStatus(200);
    }

    public function a_doc_user_cannot_view_index()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);

        $this->get('/schedule/index')
            ->assertStatus(302)
            ->assertRedirect('home');
    }

    public function a_master_user_can_view_schedule_edit()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');

        $this->get('/schedule/edit/'.$doc->id)
            ->assertStatus(200);
    }

    public function an_admin_user_can_view_schedule_edit()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');

        $this->get('/schedule/edit/'.$doc->id)
            ->assertStatus(200);
    }

    public function a_doc_user_can_view_they_own_schedule_edit()
    {
        $doc = $this->defaultUser([],'doc');
        $this->actingAs($doc);

        $this->get('/schedule/edit/'.$doc->id)
            ->assertStatus(200);
    }

    public function a_doc_user_cannot_view_other_schedule_edit()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');

        $this->get('/schedule/edit/'.$doc->id)
            ->assertStatus(302)
            ->assertRedirect('home');
    }

    /**     * @test      */
    public function a_master_user_can_view_report()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');
        $DataUser = DataUser::where('user_id', $doc->id)->first();
        $user_id = $DataUser->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/report/show/'.$user_id)
            ->assertSee('Docente: ' . $user->name);
    }

    /**     * @test      */
    public function an_admin_user_can_view_report()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $doc = $this->defaultUser([],'doc');
        $DataUser = DataUser::where('user_id', $doc->id)->first();
        $user_id = $DataUser->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/report/show/'.$user_id)
            ->assertSee('Docente: ' . $user->name);
    }

    /**     * @test      */
    public function a_doc_user_can_view_they_own_report()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);

        $DataUser = DataUser::first();
        $user_id = $DataUser->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/report/show/'.$user_id)
            ->assertSee('Docente: ' . $user->name);
    }

    /**     * @test      */
    public function a_doc_user_cannot_view_other_report()
    {
        $doc1 = $this->defaultUser([],'doc');
        $this->actingAs($doc1);
        $doc2 = $this->defaultUser([],'doc');
        $DataUser = DataUser::where('user_id', $doc2->id)->first();
        $user_id = $DataUser->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/report/show/'.$user->id)
            ->assertStatus(302)
            ->assertRedirect('home');
    }

    /**     * @test      */
    public function a_master_user_can_view_cronograma()
    {
        $auth = $this->defaultUser([],'master');
        $this->actingAs($auth);

        $user = $this->defaultUser([],'doc');

        $this->get('/schedule/crono/show/'.$user->id)
            ->assertSee('Cronograma del docente: ')
            ->assertSee($user->name);
    }

    /**     * @test      */
    public function an_admin_user_can_view_cronograma()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $user = $this->defaultUser([],'doc');

        $this->get('/schedule/crono/show/'.$user->id)
            ->assertSee('Cronograma del docente: ')
            ->assertSee($user->name);
    }

    /**     * @test      */
    public function a_doc_user_can_view_they_own_cronograma()
    {
        $user = $this->defaultUser([],'doc');
        $this->actingAs($user);

        $this->get('/schedule/crono/show/'.$user->id)
            ->assertSee('Cronograma del docente: ')
            ->assertSee($user->name);
    }

    /**     * @test      */
    public function a_doc_user_cannot_view_other_cronograma()
    {
        $doc1 = $this->defaultUser([],'doc');
        $this->actingAs($doc1);
        $doc2 = $this->defaultUser([],'doc');
        $DataUser = DataUser::where('user_id', $doc2->id)->first();
        $user_id = $DataUser->user_id;
        $user = User::findOrFail($user_id);
        $this->get('/schedule/crono/show/'.$user->id)
            ->assertStatus(302)
            ->assertRedirect('home');
    }

}
