<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Patients;
use Faker\Generator as Faker;

$factory->define(App\Patients::class, function (Faker $faker) {
    $gender = $faker->randomElement(['M', 'F']);
    return [
        'name' => $faker->sentence(1),
        'surname' =>$faker->sentence(1),
        'email' => $faker->unique()->safeEmail,
        'nationality' => $faker->sentence(1),
        'dbo' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'gender' => $gender,
        'weight' => $faker->sentence(1),
        'height' => $faker->sentence(1),
        'status' => $faker->sentence(1),
        'telephone' => $faker->phoneNumber,
        'identity_number' => $faker->unique()->randomNumber($nbDigits = 8, $strict = true)

    ];
});
