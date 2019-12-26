<?php

namespace Tests\Unit;

use App\Email;
use App\Http\Controllers\EmailController;
use App\Tmail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CRUD09_SendEmailTest extends TestCase
{
  	use DatabaseMigrations;
    /** 
    *  Agregar en phpunit.xml
    *  <env name="MAIL_DRIVER" value="log"/>
    */

    /**     * @test     */
    public function mail_is_send()
    {
        $auth = $this->defaultUser([],'admin');
        $this->actingAs($auth);

        $user1 = $this->defaultUser([],'doc');
        // $user2 = $this->defaultUser([],'doc');
        // $user3 = $this->defaultUser([],'doc');
        // $user4 = $this->defaultUser([],'doc');
        // $user5 = $this->defaultUser([],'doc');

        $users = [$user1];
        // , $user2, $user3, $user4, $user5];

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.email.notification',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);

        foreach ($users as $user) {
            // Crea archivos pdf ficticios
            $file_to_attach = storage_path() . '/reports/report_' . $user->cdocente . '.pdf';
            $archivo = fopen($file_to_attach, "a") ;
            fclose($archivo);   

            $email = Email::create([
                'tmail_id' => $tmail->id,
                'from' => 'ucss.fcec.lim@gmail.com',
                'user_id_to' => $user->id,
                'to' => $user->email,
                'view' => $tmail->view,
                'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
            ]);
        }
        $response = $this->get(route('app.email.send.notification', $tmail->id));

        $sended = Email::whereNotNull('send_date')->get();
        $this->assertTrue($sended->count() == 1);        

        // $this->assertDatabaseHas('emails',[
        //     'tmail_id' => $tmail->id,
        //     'from' => 'ucss.fcec.lim@gmail.com',
        //     'to' => $user5->email,
        //     'user_id_to' => $user5->id,
        //     'view' => $tmail->view,
        //     'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
        //     'send_date' => now()->format('Y-m-d H:i:s')
        // ]);

    }
}
