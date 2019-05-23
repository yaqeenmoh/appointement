<?php

use Illuminate\Database\Seeder;

class AppointmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'client_id' => 1, 'employee_id' => 1, 'start_time' => '02:55:35', 'end_time' => '05:55:39', 'comments' => 'today we have a client ',],

        ];

        foreach ($items as $item) {
            \App\Appointment::create($item);
        }
    }
}
