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
        ['slug' => 'view-countries', 'name' => 'View Countries', 'description' => 'Allows a user to view the country list.'],
        ['slug' => 'create-countries', 'name' => 'Create Countries', 'description' => 'Allows a user to create new countries.'],
        ['slug' => 'edit-countries', 'name' => 'Edit Countries', 'description' => 'Allows a user to edit existing countries.'],
        ['slug' => 'delete-countries', 'name' => 'Delete Countries', 'description' => 'Allows a user to delete existing countries.'],
        ['slug' => 'view-languages', 'name' => 'View Languages', 'description' => 'Allows a user to view the language list.'],
        ['slug' => 'create-languages', 'name' => 'Create Languages', 'description' => 'Allows a user to create new languages.'],
        ['slug' => 'edit-languages', 'name' => 'Edit Languages', 'description' => 'Allows a user to edit existing languages.'],
        ['slug' => 'delete-languages', 'name' => 'Delete Languages', 'description' => 'Allows a user to delete existing languages.'],
        ['slug' => 'view-scripts', 'name' => 'View Scripts', 'description' => 'Allows a user to view the script list.'],
        ['slug' => 'create-scripts', 'name' => 'Create Scripts', 'description' => 'Allows a user to create new scripts.'],
        ['slug' => 'edit-scripts', 'name' => 'Edit Scripts', 'description' => 'Allows a user to edit existing scripts.'],
        ['slug' => 'delete-scripts', 'name' => 'Delete Scripts', 'description' => 'Allows a user to delete existing scripts.'],
        ['slug' => 'view-locales', 'name' => 'View Locales', 'description' => 'Allows a user to view the locale list.'],
        ['slug' => 'create-locales', 'name' => 'Create Locales', 'description' => 'Allows a user to create new locales.'],
        ['slug' => 'edit-locales', 'name' => 'Edit Locales', 'description' => 'Allows a user to edit existing locales.'],
        ['slug' => 'delete-locales', 'name' => 'Delete Locales', 'description' => 'Allows a user to delete existing locales.'],
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
