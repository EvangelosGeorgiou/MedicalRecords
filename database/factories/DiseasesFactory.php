<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BodyParts;
use App\Diseases;
use Faker\Generator as Faker;

$factory->define(Diseases::class, function (Faker $faker) {

    return [
        'icd_code_id' => $faker->numberBetween(1,100),
        'description' => $faker->sentence(4),
        'diagnosis' => $faker->sentence(1),
        'symptoms'=> $faker->sentence(8),
        'doc_name' => $faker->name($gender = 'male'|'female'),
        'date' =>  $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d') ,
        'body_part' => BodyParts::all()->random()->name,
        'patient_id' => $faker->numberBetween(1,20)
    ];
});
