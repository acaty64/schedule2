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

Periodo::create([ 'cdocente' => '2140', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2114', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2617', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2481', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2418', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1331', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1907', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2838', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2200', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1708', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2952', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '2175', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0587', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '3514', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2123', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1776', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2843', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1537', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1651', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '3249', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2420', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2326', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '2201', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '3130', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0583', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2100', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2257', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '2033', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0777', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1257', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0443', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0861', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1181', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1418', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2299', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1325', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1892', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1135', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1464', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/10/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0475', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1017', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1792', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1761', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2034', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1997', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1543', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2085', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1493', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1559', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1097', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1306', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '2018', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0807', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1303', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1988', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0808', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1312', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0905', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0001', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0265', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0387', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1283', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0298', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0458', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1100', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/10/2020'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0021', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0809', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0138', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0254', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0526', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0584', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0159', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0069', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1380', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0912', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1251', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0087', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1394', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1452', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0258', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/05/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0005', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0347', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0660', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1305', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0028', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2424', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0581', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1085', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0031', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0977', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0099', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1081', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0322', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1194', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1690', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1173', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0970', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/05/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0897', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/09/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0036', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2661', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1004', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0633', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0448', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0240', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1158', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/01/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1162', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0211', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1747', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1521', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '0489', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/07/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '2419', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1319', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0047', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1060', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0378', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0075', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/04/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '2187', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1266', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/12/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0365', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2020'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1322', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0360', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/08/2019'), 'periodo' => '2017-2018', 'status' => true]);
Periodo::create([ 'cdocente' => '1534', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0432', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0163', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '30/06/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0433', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0230', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0983', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0460', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0996', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0812', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1318', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0813', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '1248', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '28/02/2020'), 'periodo' => '2018-2019', 'status' => true]);
Periodo::create([ 'cdocente' => '0060', 'fecha_ini' => DateTime::createFromFormat('d/m/Y', '15/07/2019'), 'fecha_fin'=>DateTime::createFromFormat('d/m/Y', '31/03/2020'), 'periodo' => '2018-2019', 'status' => true]);
    }
}
