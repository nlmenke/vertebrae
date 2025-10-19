<?php
/**
 * Permission seeder.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Permission;
use CreatePermissionsTables;

/**
 * Seeds the database with initial permission data.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class PermissionSeeder extends AbstractSeeder
{
    /**
     * Items to be seeded.
     *
     * @var array<array<string, mixed>>
     */
    protected array $itemList = [
        ['slug' => 'view-roles', 'name' => 'View Roles', 'description' => 'Allows a user to view the role list.'],
        ['slug' => 'create-roles', 'name' => 'Create Roles', 'description' => 'Allows a user to create new roles.'],
        ['slug' => 'edit-roles', 'name' => 'Edit Roles', 'description' => 'Allows a user to edit existing roles.'],
        ['slug' => 'delete-roles', 'name' => 'Delete Roles', 'description' => 'Allows a user to delete existing roles.'],
        ['slug' => 'view-users', 'name' => 'View Users', 'description' => 'Allows a user to view the user list.'],
        ['slug' => 'edit-users', 'name' => 'Edit Users', 'description' => 'Allows a user to edit existing users.'],
        ['slug' => 'edit-user-roles', 'name' => 'Edit User Roles', 'description' => 'Allows a user to edit the roles assigned to users.'],
        ['slug' => 'edit-user-permissions', 'name' => 'Edit User Permissions', 'description' => 'Allows a user to edit the permissions assigned to users.'],
        ['slug' => 'view-currencies', 'name' => 'View Currencies', 'description' => 'Allows a user to view the currency list.'],
        ['slug' => 'create-currencies', 'name' => 'Create Currencies', 'description' => 'Allows a user to create new currencies.'],
        ['slug' => 'edit-currencies', 'name' => 'Edit Currencies', 'description' => 'Allows a user to edit existing currencies.'],
        ['slug' => 'delete-currencies', 'name' => 'Delete Currencies', 'description' => 'Allows a user to delete existing currencies.'],
    ];

    /**
     * Tables that should be truncated before running.
     *
     * @var list<string>
     */
    protected array $truncateTables = [
        CreatePermissionsTables::TABLE,
        CreatePermissionsTables::TABLE_PIVOT_ROLE,
        CreatePermissionsTables::TABLE_PIVOT_USER,
    ];

    /**
     * Creates a new seeder instance.
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}
