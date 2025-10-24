<?php
/**
 * Language factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates test data for Language models with default attributes and states.
 *
 * @extends Factory<Language>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<model-property<Language>, mixed>
     */
    public function definition(): array
    {
        $languageCode = fake()->unique()->languageCode();

        return [
            'iso_alpha_2' => $languageCode,
            'iso_alpha_3' => $languageCode . fake()->randomLetter(),
            'name' => fake()->unique()->word(),
        ];
    }
}
