<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FamilyHistory;
use Faker\Generator as Faker;

$factory->define(FamilyHistory::class, function (Faker $faker) {
    return [
        'family_member_name' => $faker->name($gender = 'male'|'female') , 
        'diagnosed_age' => $faker->numberBetween(20,80),
        'diagnosed_year' =>$faker->numberBetween(1980,2021),
        'disease_name'  => $faker->sentence(1),
        'description'  => $faker->sentence(4),
        'extra_notes'  => $faker->sentence(10),
        'family_side'  => $faker->sentence(1),
        'patient_id' => $faker->numberBetween(1,20)
    ];
});
