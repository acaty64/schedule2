<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TrolesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DataUsersTableSeeder::class);
        $this->call(DerechosTableSeeder::class);
        $this->call(GozadasTableSeeder::class);
        $this->call(FeriadosTableSeeder::class);
        $this->call(HolidaysTableSeeder::class);
        $this->call(PeriodosTableSeeder::class);
        $this->call(ProgramadasTableSeeder::class);
        $this->call(SemestresTableSeeder::class);
        $this->call(HorariosTableSeeder::class);
        $this->call(TmailsTableSeeder::class);
    }
}
