<?php

use App\Gozada;
use Illuminate\Database\Seeder;

class GozadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gozada::create([
        	'cdocente'=>'900000',
        	// 'periodo'=>'2018-2019',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '05/07/2018'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '10/07/2018'),
            'observaciones' => 'Data inicial' ,
        ]);
        Gozada::create([
            'cdocente'=>'900000',
            // 'periodo'=>'2018-2019',
            'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '14/08/2019'),
            'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/08/2019'),
            'observaciones' => 'Data inicial' ,
        ]);

        if(env('APP_ENV') != 'testing'){
            Gozada::create(['cdocente'=> '000566', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '18/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '18/12/2019'),  ]);
            Gozada::create(['cdocente'=> '000152', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/05/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '01/05/2019'),  ]);

            Gozada::create(['cdocente'=> '000508', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/02/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '02/03/2019'),  ]);

            Gozada::create(['cdocente'=> '000728', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/09/2019'),  ]);
            Gozada::create(['cdocente'=> '000590', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/09/2019'),  ]);
            Gozada::create(['cdocente'=> '000474', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '07/09/2019'),  ]);
            Gozada::create(['cdocente'=> '000510', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/10/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '09/10/2019'),  ]);
            Gozada::create(['cdocente'=> '000253', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/09/2019'),  ]);

            Gozada::create(['cdocente'=> '000113', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/03/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '01/03/2019'),  ]);

            Gozada::create(['cdocente'=> '000285', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/08/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '11/08/2019'),  ]);

            Gozada::create(['cdocente'=> '000191', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/09/2019'),  ]);
            Gozada::create(['cdocente'=> '000201', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '12/09/2019'),  ]);
            Gozada::create(['cdocente'=> '000242', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '06/09/2019'),  ]);


            Gozada::create(['cdocente'=> '000645', 'observaciones' => 'Data inicial' ,'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/03/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/03/2019'),  ]);






        }
    }
}