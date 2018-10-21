<?php

use App\Entities\Currency\Currency;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Currency::class, function (Faker $faker) {
    return [
        'iso_alpha' => $faker->currencyCode,
        'iso_number' => str_pad($faker->randomNumber(3), 3, 0, STR_PAD_LEFT),
        'name' => $faker->country . ' Dollar',
        'symbol' => $faker->randomAscii,
        'exchange_rate' => floatVal($faker->randomNumber()),
    ];
});
