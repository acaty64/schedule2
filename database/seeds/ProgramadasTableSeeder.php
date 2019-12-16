<?php

use App\Programada;
use Illuminate\Database\Seeder;

class ProgramadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Programada::create([
        	'cdocente'=>'900000',
        	// 'periodo'=>'2018-2019',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '01/07/2018'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '01/07/2018'),
            'paso'=>1,
            'maximo'=>15,
            'type' => 'new'
        ]);
        Programada::create([
            'cdocente'=>'900000',
            // 'periodo'=>'2018-2019',
            'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '15/07/2019'),
            'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/08/2019'),
            'minimo' => 7,
            'paso'=>15,
            'maximo'=>30,
            'type' => 'fixed'
        ]);
        Programada::create([
        	'cdocente'=>'900000',
        	// 'periodo'=>'2018-2019',
        	'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '16/12/2019'),
        	'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '29/01/2020'),
            'minimo' => 7,
            'paso'=>15,
            'maximo'=>45,
            'type' => 'fixed'
        ]);


Programada::create(['cdocente'=>'000566', 'minimo'=>20, 'paso'=>0, 'maximo'=>20, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '07/01/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000566', 'minimo'=>30, 'paso'=>0, 'maximo'=>30, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '17/07/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '15/08/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000566', 'minimo'=>20, 'paso'=>0, 'maximo'=>20, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '07/01/2021'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000152', 'minimo'=>60, 'paso'=>7, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000152', 'minimo'=>30, 'paso'=>7, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '15/07/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/08/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000508', 'minimo'=>60, 'paso'=>0, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/02/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000508', 'minimo'=>30, 'paso'=>0, 'maximo'=>30, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '17/07/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '15/08/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000508', 'minimo'=>20, 'paso'=>0, 'maximo'=>20, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '07/01/2021'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000728', 'minimo'=>47, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '03/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000590', 'minimo'=>48, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '04/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000474', 'minimo'=>53, 'paso'=>0, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '09/02/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000510', 'minimo'=>51, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '07/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000253', 'minimo'=>47, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '03/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000620', 'minimo'=>35, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '22/01/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000620', 'minimo'=>0, 'paso'=>7, 'maximo'=>30, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '17/07/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '13/08/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000113', 'minimo'=>59, 'paso'=>0, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '15/02/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000113', 'minimo'=>0, 'paso'=>7, 'maximo'=>30, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '17/07/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '15/08/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000113', 'minimo'=>20, 'paso'=>7, 'maximo'=>30, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '07/01/2021'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000285', 'minimo'=>47, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '03/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000007', 'minimo'=>60, 'paso'=>0, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/02/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000191', 'minimo'=>47, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '03/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000201', 'minimo'=>48, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '04/02/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000242', 'minimo'=>60, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '27/01/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000242', 'minimo'=>14, 'paso'=>7, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '17/07/2020'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/07/2020'), 'type' => 'fixed' ]);
Programada::create(['cdocente'=>'000241', 'minimo'=>60, 'paso'=>0, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/02/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000441', 'minimo'=>60, 'paso'=>0, 'maximo'=>60, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '16/02/2020'), 'type' => 'closed' ]);
Programada::create(['cdocente'=>'000645', 'minimo'=>32, 'paso'=>7, 'maximo'=>53, 'fecha_ini'=>DateTime::createFromFormat('d/m/Y', '19/12/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '19/01/2020'), 'type' => 'fixed' ]);










    }
}
