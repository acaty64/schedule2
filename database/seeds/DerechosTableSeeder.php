<?php

use App\Derecho;
use Illuminate\Database\Seeder;

class DerechosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Derecho::create([
        	'cdocente'=>'900000',
        	'periodo'=>'2018-2019',
        	'dias'=>60
        ]);
        Derecho::create([
            'cdocente'=>'900000',
            'periodo'=>'2019-2020',
            'dias'=>60
        ]);


Derecho::create(['cdocente' => '000566','periodo' => '2019-2020','dias' => 60]);
Derecho::create(['cdocente' => '000152','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000152','periodo' => '2019-2020','dias' => 60]);
Derecho::create(['cdocente' => '000508','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000508','periodo' => '2019-2020','dias' => 60]);
Derecho::create(['cdocente' => '000728','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000590','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000474','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000510','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000253','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000620','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000113','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000113','periodo' => '2019-2020','dias' => 60]);
Derecho::create(['cdocente' => '000285','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000007','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000191','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000201','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000242','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000241','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000441','periodo' => '2018-2019','dias' => 60]);
Derecho::create(['cdocente' => '000645','periodo' => '2018-2019','dias' => 60]);








        
    }
}
