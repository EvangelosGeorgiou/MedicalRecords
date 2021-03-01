<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DoctorSpeciality;
use Faker\Generator as Faker;

$factory->define(DoctorSpeciality::class, function (Faker $faker) {
    $speciality = $faker->randomElement(['Dermatology', 'Neurology', 'Pathology', 'Pediatrics',
                                            'Psychiatry', 'Surgery','Urology','Diagnostic Radiology','Allergy and immunology']);

    return [
        'doc_speciality' =>  $faker->unique()->randomElement(['Dermatology', 'Neurology', 'Pathology', 'Pediatrics',
        'Psychiatry', 'Surgery','Urology','Diagnostic Radiology','Allergy and immunology']),
    ];
});
