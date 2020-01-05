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
        $user2 = $this->defaultUser([],'doc');
        // $user3 = $this->defaultUser([],'doc');
        // $user4 = $this->defaultUser([],'doc');
        // $user5 = $this->defaultUser([],'doc');

        $users = [$user1, $user2];
        // , $user2, $user3, $user4, $user5];

        $tmail = Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.email.notification',
            'limit_date' => date_create_from_format('d/m/Y', '31/01/2020'),
        ]);

        foreach ($users as $user) {
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
                'subject' => $tmail->subject,
                'view' => $tmail->view,
                'file_to_attach1' => $file_to_attach1,
                'file_name1' => $file_name1,
                'file_to_attach2' => $file_to_attach2,
                'file_name2' => $file_name2,
                'limit_date' => $tmail->limit_date->format('Y-m-d H:i:s'),
            ]);

        }

        // borrar logs
        array_map('unlink', array_filter((array) glob(storage_path('logs/*.log'))));
        
        $response = $this->get(route('app.email.send.notification', $tmail->id))
                    ->assertStatus(302);

        $hoy = now()->format('Y-m-d');
        $name_file = 'laravel-' . $hoy . '.log';
        $file = storage_path(). DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . $name_file;
        // Espera a que se cree el archivo laravel.log
        do{  } while(!file_exists($file));

        foreach ($users as $user) {
            $archivo = file_get_contents($file);
            $search = $user->email;
            $pos = strpos($archivo, $search);

            // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
            if ($pos === false) {
                $this->assertTrue(false);
                echo "La cadena '$search' no fue encontrada en la cadena dada";
            } else {
                $this->assertTrue(true);
                // echo "La cadena '$search' fue encontrada en la cadena dada";
                // echo " y existe en la posición $pos";
            }

        }

        $sended = Email::whereNotNull('send_date')->get();

        $this->assertTrue($sended->count() == count($users));        

    }
}
