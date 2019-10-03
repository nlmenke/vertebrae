<?php declare(strict_types=1);

use App\Entities\Script\Script;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Script::class, function (Faker $faker) {
    return [
        'iso_alpha' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
        'iso_numeric' => str_pad((string)$faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
        'name' => $faker->word,
        'direction' => $faker->randomElement(['l-r', 'r-l', 't-b']),
    ];
});
