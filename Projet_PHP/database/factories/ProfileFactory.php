<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'birthDate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'telNbr' => $faker->tollFreePhoneNumber,
        'address' => $faker->address,
    ];
});
