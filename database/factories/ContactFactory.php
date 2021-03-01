<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\ContactInformation;

$factory->define(ContactInformation::class, function (Faker $faker) {
    return [
        'country' => 'Cyprus',
        'city' => 'Limassol',
        'postal_code' => '1234',
        'address' => $faker->address,
        'patient_id' => $faker->unique()->numberBetween(1,20)
    ];
});
