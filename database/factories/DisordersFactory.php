<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Disorders;
use Faker\Generator as Faker;

$factory->define(Disorders::class, function (Faker $faker) {
    return [
        'icd_code_id' => $faker->numberBetween(1,79560),
        'description' => $faker->sentence(4),
        'date' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'body_part_id' => $faker->numberBetween(1,20),
        'patient_id'  => $faker->numberBetween(1,20),
    ];
});
