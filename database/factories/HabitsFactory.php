<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Habits;
use Faker\Generator as Faker;

$factory->define(Habits::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'patient_id' => $faker->numberBetween(1,20),
    ];
});
