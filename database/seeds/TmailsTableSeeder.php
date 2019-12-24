<?php

use App\Tmail;
use Illuminate\Database\Seeder;

class TmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tmail::create([
            'name' => 'Requerimiento',
            'subject' => 'Acceso al módulo',
            'view' => 'app.mail.email.notification',
            'limit_date' => date_create_from_format('d/m/Y H:i:s', '07/01/2020 23:59:59'),
        ]);
    }
}
