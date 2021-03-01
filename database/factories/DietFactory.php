<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Diet;
use Faker\Generator as Faker;

$factory->define(Diet::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(4),
        'start_date' =>$faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'finish_date' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'patient_id' => $faker->numberBetween(1,20),
    ];
});
