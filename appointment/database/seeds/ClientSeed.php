<?php

use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'first_name' => 'yaqeen', 'last_name' => 'mohammed', 'phone_number' => '0789415808', 'email' => 'yaqeen_mohammed@yahoo.com',],

        ];

        foreach ($items as $item) {
            \App\Client::create($item);
        }
    }
}
