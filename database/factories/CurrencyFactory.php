<?php declare(strict_types=1);

use App\Entities\Currency\Currency;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Currency::class, function (Faker $faker) {
    return [
        'iso_alpha' => $faker->unique()->currencyCode,
        'iso_numeric' => str_pad((string)$faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
        'name' => $faker->country . ' Dollar',
        'symbol' => $faker->randomAscii,
        'decimal_precision' => $faker->randomNumber(1),
        'exchange_rate' => $faker->randomFloat(6, 0, 999999),
    ];
});
