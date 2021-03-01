<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VisitHistory;
use Faker\Generator as Faker;

$factory->define(VisitHistory::class, function (Faker $faker) {
    $speciality = $faker->randomElement(['Dermatology', 'Neurology', 'Pathology', 'Pediatrics',
                                            'Psychiatry', 'Surgery','Urology','Diagnostic Radiology','Allergy and immunology']);
    return [
        'doc_name' => $faker->name($gender = 'male'|'female'),
        'doc_speciality_id' => $faker->numberBetween(1,7),
        'reason_of_visit' => $faker->sentence(4),
        'description' => $faker->sentence(10),
        'date' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d') ,
        'patient_id' => $faker->numberBetween(1,20)
    ];
});
