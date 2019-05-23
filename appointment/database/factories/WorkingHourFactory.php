<?php

$factory->define(App\WorkingHour::class, function (Faker\Generator $faker) {
    return [
        "employee_id" => factory('App\Employee')->create(),
        "date" => $faker->date("Y-m-d", $max = 'now'),
        "start_time" => $faker->date("H:i:s", $max = 'now'),
        "end_time" => $faker->date("H:i:s", $max = 'now'),
    ];
});
