<?php declare(strict_types=1);
/**
 * Language Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding languages to the application's database.
 *
 * @package   Database Factories
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 * @since     x.x.x introduced
 */

use App\Entities\Language\Language;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Language::class, function (Faker $faker) {
    return [
        'iso_alpha_2' => $faker->unique()->languageCode,
        'iso_alpha_3' => $faker->unique()->languageCode . $faker->randomLetter,
        'name' => $faker->firstName,
    ];
});
