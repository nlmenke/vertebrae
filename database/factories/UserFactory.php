<?php declare(strict_types=1);
/**
 * User Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding users to the application's database.
 *
 * @package   Database Factories
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 * @since     0.0.0-framework introduced
 * @since     x.x.x           set email to be variant of unique name
 */

use App\Entities\User\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    $name = $faker->unique()->name;

    return [
        'name' => $name,
        'email' => Str::snake($name, '.') . '@' . $faker->safeEmailDomain,
        'email_verified_at' => now(),
        'password' => bcrypt($name),
        'remember_token' => Str::random(10),
    ];
});
