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
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

declare(strict_types=1);

namespace Database\Factories\Entities\Script;

use App\Entities\Script\Script;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The Script factory class.
 *
 * This class gives the ability to create database entries in the scripts
 * table. Factories should only be used in feature tests or any time you
 * require dummy data.
 *
 * @since 0.0.0-framework introduced
 */
class ScriptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Script::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'iso_alpha' => $this->faker->randomLetter . $this->faker->randomLetter . $this->faker->randomLetter . $this->faker->randomLetter,
            'iso_numeric' => str_pad((string)$this->faker->unique()->randomNumber(2), 3, '0', STR_PAD_LEFT),
            'name' => $this->faker->word,
            'direction' => $this->faker->randomElement(['l-r', 'r-l', 't-b']),
        ];
    }
}
