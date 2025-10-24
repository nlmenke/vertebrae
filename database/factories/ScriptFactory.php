<?php
/**
 * Script factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Script;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Generates test data for Script models with default attributes and states.
 *
 * @extends Factory<Script>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class ScriptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<model-property<Script>, mixed>
     */
    public function definition(): array
    {
        return [
            'iso_alpha' => ucfirst(fake()->unique()->lexify()),
            'iso_numeric' => fake()->unique()->numerify(),
            'name' => fake()->unique()->word(),
            'direction' => fake()->randomElement(['ltr', 'rtl', 'ttb', 'varies']),
        ];
    }
}
