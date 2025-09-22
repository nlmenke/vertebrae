<?php

/**
 * User Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding users to the application's database.
 *
 * @package Database Factories
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since 0.0.0-framework introduced
 * @since x.x.x           set email to be variant of unique name
 */

declare(strict_types=1);

namespace Database\Factories\Entities\User;

use App\Entities\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * The Currency factory class.
 *
 * This class gives the ability to create database entries in the users table.
 * Factories should only be used in feature tests or any time you require dummy
 * data.
 *
 * @since 0.0.0-framework introduced
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->name;

        return [
            'name' => $name,
            'email' => Str::snake($name, '.') . '@' . $this->faker->safeEmailDomain,
            'email_verified_at' => now(),
            'password' => bcrypt($name),
            'remember_token' => Str::random(10),
        ];
    }
}
