<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Allergies;
use Faker\Generator as Faker;

$factory->define(Allergies::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'description' => $faker->sentence(4),
        'date' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'patient_id'  => $faker->numberBetween(1,20),
    ];
});
