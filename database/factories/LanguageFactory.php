<?php
/**
 * Language Factory.
 *
 * This file provides a convenient way to generate new model instances for
 * testing / seeding languages to the application's database.
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

namespace Database\Factories;

use App\Entities\Language\Language;
use Illuminate\Database\Eloquent\Factory;

class LanguageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Language::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'iso_alpha_2' => $this->faker->unique()->languageCode,
            'iso_alpha_3' => $this->faker->unique()->languageCode . $this->faker->randomLetter,
            'name' => $this->faker->firstName,
        ];
    }
}
