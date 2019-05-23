<?php

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "phone" => $faker->name,
        "email" => $faker->safeEmail,
    ];
});
