<?php
/**
 * User seeder.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use CreateUsersTable;

/**
 * Seeds the database with initial user data.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UserSeeder extends AbstractSeeder
{
    /**
     * Tables that should be truncated before running.
     *
     * @var list<string>
     */
    protected array $truncateTables = [
        CreateUsersTable::TABLE,
    ];

    /**
     * Creates a new seeder instance.
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Additional tasks to be completed after seeding.
     */
    protected function complete(): void
    {
        if (app()->isLocal()) {
            // create basic users for development/testing
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]);

            User::factory()->create([
                'name' => 'User',
                'email' => 'user@example.com',
            ]);
        }
    }
}
