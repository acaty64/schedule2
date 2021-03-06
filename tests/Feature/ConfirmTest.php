<?php

namespace Tests\Feature;

use App\Email;
use App\Role;
use App\Tmail;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfirmTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_doc_access_confirm_view()
    {
        $this->seed();

        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);
        $user = $auth;

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.email.required',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        $email = Email::create([
            'tmail_id' => $tmail->id,
            'from' => env('MAIL_USERNAME'),
            'to' => $user->email,
            'user_id_to' => $user->id,
            'subject' => $tmail->subject,
            'view' => $tmail->view,
            'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
        ]);
        $file_to_attach1 = storage_path() . '/app/public/reports/report_' . $user->cdocente . '.pdf';
        $file_name1 = 'report_' . $user->name . '.pdf';
        $file_to_attach2 = storage_path() . '/app/public/reports/crono_' . $user->cdocente . '.pdf';
        $file_name2 = 'crono_' . $user->name . '.pdf';
        $this->get(route('schedule.confirm.view', ['tmail_id'=>$tmail->id, 'docente_id'=>$user->id]))
            ->assertViewIs('app.schedule.confirm')
            ->assertSee($user->wdocente);

        $this->assertDatabaseHas('emails',[
            'tmail_id' => $tmail->id,
            'from' => env('MAIL_USERNAME'),
            'to' => $user->email,
            'user_id_to' => $user->id,
            'cc1' => 'direccion_rrhh@ucss.edu.pe',
            'subject' => 'Confirmación de cronograma.',
            'view' => 'app.mail.email.reply',
            'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
            'file_to_attach1' => $file_to_attach1,
            'file_name1' => $file_name1,
            'file_to_attach2' => $file_to_attach2,
            'file_name2' => $file_name2,
        ]);        

        $file_reply_view = storage_path('app/public/view/reply_' . $user->cdocente . '.pdf');

        $this->assertTrue(file_exists($file_reply_view));

    }

    /** @test */
    public function user_doc_send_confirm_mail()
    {
        $auth = $this->defaultUser([],'doc');
        $this->actingAs($auth);
        $user = $auth;

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Requerimiento de disponibilidad UCSS-FCEC. Acceso al módulo',
            'view' => 'app.mail.email.notification',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);
        $email = Email::create([
            'tmail_id' => $tmail->id,
            'from' => env('MAIL_USERNAME'),
            'to' => $user->email,
            'user_id_to' => $user->id,
            'subject' => $tmail->subject,
            'view' => $tmail->view,
            'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
        ]);

        // Crea archivos pdf ficticios
        $file_to_attach1 = storage_path() . '/app/public/reports/report_' . $user->cdocente . '.pdf';
        $file_name1 = 'report_' . $user->name;
        $file_to_attach2 = storage_path() . '/app/public/reports/crono_' . $user->cdocente . '.pdf';
        $file_name2 = 'crono_' . $user->name;
        $archivo = fopen($file_to_attach1, "a") ;
        fclose($archivo);   
        $archivo = fopen($file_to_attach2, "a") ;
        fclose($archivo);   

        $email = Email::create([
            'tmail_id' => $tmail->id,
            'from' => 'ucss.fcec.lim@gmail.com',
            'user_id_to' => $user->id,
            'to' => $user->email,
            'cc1' => 'direccion_rrhh@ucss.edu.pe',
            'subject' => $tmail->subject,
            'view' => 'app.mail.email.reply',
            'file_to_attach1' => $file_to_attach1,
            'file_name1' => $file_name1,
            'file_to_attach2' => $file_to_attach2,
            'file_name2' => $file_name2,
            'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
        ]);

        $response = $this->get(route('email.confirm.send', ['tmail_id'=>$tmail->id, 'docente_id'=>$user->id]))
                ->assertStatus(200)
                ->assertViewIs('thanks');

        $sended = Email::whereNotNull('reply_date')->get();
        $this->assertTrue($sended->count() == 1);

    }

}
