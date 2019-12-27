<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DownloadStorageTest extends TestCase
{
    use DatabaseMigrations;

    /** * @test     */
    public function it_create_a_report_pdf_file_in_storage_path()
    {

        $this->seed();

        $user_id = Role::where('trole_id', 3)->first()->user_id;

        $user = User::findOrFail($user_id);

		$response = $this->get(route('api.schedule.report.download.storage', $user_id));

		$file_to_attach = storage_path() . '/reports/report_' . $user->cdocente . '.pdf';

    	$time = 0;
    	do {
    		$time++ ;
    		if(file_exists($file_to_attach)){
    			break;
    		}
    	}while(!file_exists($file_to_attach));

		$this->assertFileExists($file_to_attach);
    
    }


    /** * @test     */
    public function it_create_a_crono_pdf_file_in_storage_path()
    {

        $this->seed();

        $user_id = Role::where('trole_id', 3)->first()->user_id;

        $user = User::findOrFail($user_id);

		$response = $this->get(route('api.schedule.crono.download.storage', $user_id));

		$file_to_attach = storage_path() . '/reports/crono_' . $user->cdocente . '.pdf';

    	$time = 0;
    	do {
    		$time++ ;
    		if(file_exists($file_to_attach)){
    			break;
    		}
    	}while(!file_exists($file_to_attach));

		$this->assertFileExists($file_to_attach);
    
    }

}
