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
        // $this->call(DatausersTableSeeder::class);
        $this->call(DerechosTableSeeder::class);
        $this->call(FeriadosTableSeeder::class);
        $this->call(HolidaysTableSeeder::class);
        $this->call(PeriodosTableSeeder::class);
        $this->call(ProgramadasTableSeeder::class);
        $this->call(SemestresTableSeeder::class);
    }
}
