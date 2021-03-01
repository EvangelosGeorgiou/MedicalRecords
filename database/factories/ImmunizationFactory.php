<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Immunization;
use Faker\Generator as Faker;

$factory->define(Immunization::class, function (Faker $faker) {
    return [
        'vaccine_name' => $faker->sentence(1),
        'date'  => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d') ,
        'description' => $faker->sentence(4),
        'patient_id' => $faker->numberBetween(1,20),
    ];
});
