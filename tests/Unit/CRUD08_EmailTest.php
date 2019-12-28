<?php

namespace Tests\Unit;

use App\Email;
use App\Horario;
use App\Semestre;
use App\Tmail;
use App\User;
use FeriadosTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use SemestresTableSeeder;
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

        $chk_date = date_create_from_format('d/m/Y H:i:s', '31/12/2019 23:59:59');

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.required',
            'limit_date' => $chk_date,
        ]);

        $data = ['tmail_id' => $tmail->id, 'chk' => $chk];

        $this->seed(SemestresTableSeeder::class);
        $this->seed(FeriadosTableSeeder::class);

        foreach ($chk as $key => $value) {
            $user = User::findOrFail($key);
            $semestres = Semestre::all();
            foreach ($semestres as $semestre) {
                Horario::create([
                    'cdocente' => $user->cdocente,
                    'semestre' => $semestre,
                    'dia' => 'LUN',
                    'turno' => 'noche',
                ]);
                Horario::create([
                    'cdocente' => $user->cdocente,
                    'semestre' => $semestre,
                    'dia' => 'MAR',
                    'turno' => 'dia',
                ]);
                Horario::create([
                    'cdocente' => $user->cdocente,
                    'semestre' => $semestre,
                    'dia' => 'MIE',
                    'turno' => 'noche',
                ]);
                Horario::create([
                    'cdocente' => $user->cdocente,
                    'semestre' => $semestre,
                    'dia' => 'JUE',
                    'turno' => 'dia',
                ]);
                Horario::create([
                    'cdocente' => $user->cdocente,
                    'semestre' => $semestre,
                    'dia' => 'VIE',
                    'turno' => 'noche',
                ]);
                Horario::create([
                    'cdocente' => $user->cdocente,
                    'semestre' => $semestre,
                    'dia' => 'SAB',
                    'turno' => 'libre',
                ]);

            }
        }

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
