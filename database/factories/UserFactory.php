<?php
/**
 * User factory.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Generates test data for User models with default attributes and states for
 * unverified users.
 *
 * @extends Factory<User>
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae set email to be variant of a unique name
 */
final class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    private static ?string $password = null;

    /**
     * Indicate that the model should have the admin role.
     */
    public function admin(): self
    {
        return $this->afterCreating(function (User $user): void {
            $user->roles()->attach(Role::query()->firstWhere('slug', 'admin'));
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<model-property<User>, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->firstName() . ' ' . fake()->unique()->lastName();

        return [
            'name' => $name,
            'email' => Str::snake($name, '.') . '@' . fake()->safeEmailDomain(),
            'email_verified_at' => now(),
            'password' => self::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'two_factor_secret' => Str::random(10),
            'two_factor_recovery_codes' => Str::random(10),
            'two_factor_confirmed_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): self
    {
        return $this->state(fn (array $attributes): array => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model does not have two-factor authentication configured.
     */
    public function withoutTwoFactor(): self
    {
        return $this->state(fn (array $attributes): array => [
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ]);
    }

    /**
     * Indicate that the model should have the given permission.
     */
    public function withPermission(string $permission): self
    {
        return $this->afterCreating(function (User $user) use ($permission): void {
            $user->permissions()->attach(Permission::query()->firstWhere('slug', $permission));
        });
    }
}
