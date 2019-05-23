<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ClientSeed::class);
        $this->call(EmployeeSeed::class);
        $this->call(AppointmentSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(WorkingHourSeed::class);

    }
}
