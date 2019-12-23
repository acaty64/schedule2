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
            'subject' => 'Correo de prueba',
            'view' => 'app.mail.required',
            'limit_date' => date_create_from_format('d/m/Y', '31/12/2019'),
        ]);
    }
}
