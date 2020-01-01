<?php
/**
 * Country Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding countries to the application's database.
 *
 * @package Database Factories
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

declare(strict_types=1);

use App\Entities\Country\Country;
use App\Entities\Currency\Currency;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */
$factory->define(Country::class, function (Faker $faker) {
    return [
        'currency_id' => factory(Currency::class)->create()->getId(),
        'iso_alpha_2' => $faker->unique()->countryCode,
        'iso_alpha_3' => $faker->unique()->countryISOAlpha3,
        'iso_numeric' => str_pad((string)$faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
        'name' => $faker->country,
    ];
});
