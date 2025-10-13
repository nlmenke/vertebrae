<?php
/**
 * Permission factory.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Generates test data for Permission models with default attributes and
 * states.
 *
 * @extends Factory<Permission>
 *
 * @since 0.0.0-vertebrae introduced
 */
final class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<model-property<Permission>, mixed>
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
