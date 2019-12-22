<?php

use App\Periodo;
use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
        	'cdocente'=>'900000',
        	'periodo'=>'2017-2018',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/01/2018'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2018'),
            'status' => false
        ]);
        Periodo::create([
            'cdocente'=>'900000',
            'periodo'=>'2018-2019',
            'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/01/2019'),
            'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2019'),
            'status' => true            
        ]);
        Periodo::create([
            'cdocente'=>'900000',
            'periodo'=>'2019-2020',
            'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/01/2020'),
            'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2020'), 
            'status' => true
        ]);

        if(env('APP_ENV') != 'testing'){

            Periodo::create(['cdocente'=> '000566', 'periodo' => '2019-2020' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '18/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2021'),  ]);
            Periodo::create(['cdocente'=> '000152', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/05/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'),  ]);
            Periodo::create(['cdocente'=> '000152', 'periodo' => '2019-2020' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/05/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2021'),  ]);
            Periodo::create(['cdocente'=> '000508', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/02/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'),  ]);
            Periodo::create(['cdocente'=> '000508', 'periodo' => '2019-2020' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/02/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2021'),  ]);
            Periodo::create(['cdocente'=> '000728', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000590', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000474', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000510', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/10/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2020'),  ]);
            Periodo::create(['cdocente'=> '000253', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000620', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000113', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/03/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '29/02/2020'),  ]);
            Periodo::create(['cdocente'=> '000113', 'periodo' => '2019-2020' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/03/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2021'),  ]);
            Periodo::create(['cdocente'=> '000285', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/08/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2020'),  ]);
            Periodo::create(['cdocente'=> '000007', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/05/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'),  ]);
            Periodo::create(['cdocente'=> '000191', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000201', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000242', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/09/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'),  ]);
            Periodo::create(['cdocente'=> '000241', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/04/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'),  ]);
            Periodo::create(['cdocente'=> '000441', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/04/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'),  ]);
            Periodo::create(['cdocente'=> '000645', 'periodo' => '2018-2019' ,'status'=> true, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/03/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'),  ]);


        }
    }
}