<?php

namespace Tests\Unit;

use App\Email;
use App\Tmail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CRUD08_EmailTest extends TestCase
{
  	use DatabaseMigrations;

    /**     * @test     */
    public function it_show_doc_user_in_index()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $email1 = $this->defaultUser([],'doc');
        $email2 = $this->defaultUser([],'doc');
        $email3 = $this->defaultUser([],'doc');
        $email4 = $this->defaultUser([],'doc');
        $email5 = $this->defaultUser([],'doc');

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.required',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

		$this->get('/email/index/'. $tmail->id)
            ->assertStatus(200)
            ->assertSee($email5->name);
    }

    /**     * @test     */
    public function it_create_emails()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $email1 = $this->defaultUser([],'doc');
        $email2 = $this->defaultUser([],'doc');
        $email3 = $this->defaultUser([],'doc');
        $email4 = $this->defaultUser([],'doc');
        $email5 = $this->defaultUser([],'doc');

        $chk = [$email3->id=>'on', $email4->id=>'on', $email5->id=>'on'];

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.required',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        $data = ['tmail_id' => $tmail->id, 'chk' => $chk];

        $response = $this->post('/email/store', $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('emails',[
            'tmail_id' => $tmail->id,
            'from' => env('MAIL_USERNAME'),
            'to' => $email5->email,
            'view' => $tmail->view,
            'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
        ]);

    }
}
