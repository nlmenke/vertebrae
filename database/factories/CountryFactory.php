<?php

use App\Entities\Country\Country;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Country::class, function (Faker $faker) {
    return [
        'iso_alpha_2' => $faker->unique()->countryCode,
        'iso_alpha_3' => $faker->unique()->countryISOAlpha3,
        'iso_numeric' => str_pad($faker->unique()->randomNumber(2), 3, 0, STR_PAD_LEFT),
        'name' => $faker->country,
    ];
});
