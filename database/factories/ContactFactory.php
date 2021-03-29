<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\ContactInformation;

$factory->define(ContactInformation::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'address' => $faker->address,
        'patient_id' => $faker->unique()->numberBetween(1,20)
    ];
});
