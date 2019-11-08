<?php
/**
 * Script Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding scripts to the application's database.
 *
 * @package Database Factories
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

declare(strict_types=1);

use App\Entities\Script\Script;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */
$factory->define(Script::class, function (Faker $faker) {
    return [
        'iso_alpha' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
        'iso_numeric' => str_pad((string)$faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
        'name' => $faker->word,
        'direction' => $faker->randomElement(['l-r', 'r-l', 't-b']),
    ];
});
