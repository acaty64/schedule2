<?php

namespace Tests\Unit;

use App\Tmail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CRUD07_TmailTest extends TestCase
{

  	use DatabaseMigrations;

    /**     * @test     */
    public function it_create_and_store_a_tmail()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $response = $this->get('tmail/create');
        $response->assertStatus(200);

        $data = [
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.required',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ];
		$response = $this->post('/tmail/store', $data);
		$response->assertStatus(302);

        $this->assertDatabaseHas('tmails',[
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.required',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        // $this->assertDatabaseHas('traces',[
        //     'cdocente' => $auth->cdocente,
        //     'change' => 'Create Tmail',
        // ]);
    }

    /**     * @test     */
    public function it_edit_and_update_a_tmail()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $tmail1 = Tmail::create([
			'name' => 'Requerimiento',
            'subject' => 'Correo de prueba 1',
			'view' => 'app.mail.required',
			'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        $tmail2 = Tmail::create([
			'name' => 'Reply',
            'subject' => 'Correo de prueba 2',
			'view' => 'app.mail.reply',
			'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        $response = $this->get('tmail/edit/2');
        $response->assertStatus(200);

        $value1 = $tmail1->name;
        $value2 = $tmail2->name;
        $response->assertDontSee($value1);
        $response->assertSee($value2);

        $data = [
        	'id' => 2,
			'name' => 'New Text',
			'view' => 'app.mail.reply',
            'subject' => 'Correo de prueba 2',
			'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ];

        $response = $this->post('tmail/update', $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('tmails', $data);
    }

    /**     * @test     */
    public function it_delete_a_tmail()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $tmail1 = Tmail::create([
			'name' => 'Requerimiento',
            'subject' => 'Correo de prueba 1',
			'view' => 'app.mail.required',
			'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        $tmail2 = Tmail::create([
			'name' => 'Reply',
            'subject' => 'Correo de prueba 2',
			'view' => 'app.mail.reply',
			'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        $response = $this->get('tmail/destroy/'.$tmail2->id);
        $response->assertStatus(302);

        $this->assertDatabaseMissing('tmails',[
			'name' => 'Reply',
            'subject' => 'Correo de prueba 2',
			'view' => 'app.mail.reply',
			'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);
    }

}
