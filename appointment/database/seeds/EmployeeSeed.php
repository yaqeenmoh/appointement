<?php

use Illuminate\Database\Seeder;

class EmployeeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'dr.firas ajlouni', 'phone' => '0789289879', 'email' => 'firas_aj@yahoo.com',],

        ];

        foreach ($items as $item) {
            \App\Employee::create($item);
        }
    }
}
