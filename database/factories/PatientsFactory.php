<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Patients;
use Faker\Generator as Faker;

$factory->define(App\Patients::class, function (Faker $faker) {
    $gender = $faker->randomElement(['M', 'F']);
    return [
        'name' => $faker->name($gender = 'male'|'female'),
        'surname' =>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'nationality' => $faker->country,
        'dbo' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'gender' => $faker->randomElement(['M','F']),
        'weight' => $faker->numberBetween(60,120),
        'height' => $faker->numberBetween(140,200),
        'status' => $faker->randomElement(['single','married','divorced']),
        'telephone' => $faker->phoneNumber,
        'identity_number' => $faker->unique()->randomNumber($nbDigits = 8, $strict = true)

    ];
});
