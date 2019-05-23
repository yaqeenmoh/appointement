<?php

use Illuminate\Database\Seeder;

class WorkingHourSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'employee_id' => 1, 'date' => '2019-05-09', 'start_time' => '04:52:15', 'end_time' => '08:43:31',],

        ];

        foreach ($items as $item) {
            \App\WorkingHour::create($item);
        }
    }
}
