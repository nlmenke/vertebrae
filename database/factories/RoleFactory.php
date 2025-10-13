<?php
/**
 * Role factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Generates test data for Role models with default attributes and states.
 *
 * @extends Factory<Role>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<model-property<Role>, mixed>
     */
    public function definition(): array
    {
        /** @var string $name */
        $name = fake()->unique()->words(2, true);

        return [
            'slug' => Str::slug($name),
            'name' => Str::title($name),
            'description' => fake()->sentence(),
        ];
    }
}
