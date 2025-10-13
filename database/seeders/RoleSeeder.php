<?php
/**
 * Role seeder.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use CreateRolesTables;

/**
 * Seeds the database with initial role data.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class RoleSeeder extends AbstractSeeder
{
    /**
     * Items to be seeded.
     *
     * @var array<array<string, mixed>>
     */
    protected array $itemList = [
        ['slug' => 'admin', 'name' => 'Administrator', 'description' => 'This role can perform any action and has access to all resources.'],
    ];

    /**
     * Tables that should be truncated before running.
     *
     * @var list<string>
     */
    protected array $truncateTables = [
        CreateRolesTables::TABLE,
        CreateRolesTables::TABLE_PIVOT,
    ];

    /**
     * Creates a new seeder instance.
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    protected function complete(): void
    {
        if (app()->isLocal()) {
            // give the first user the first (admin) role
            $user = User::query()->first();
            $role = Role::query()->first();

            $user?->roles()->attach($role);
        }
    }
}
