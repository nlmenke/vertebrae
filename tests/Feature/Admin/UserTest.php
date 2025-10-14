<?php
/**
 * Tests functionality related to the user admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertSame;

test('guests are redirected to the login page', function (): void {
    get(route('admin.users.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the users index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.index'))
        ->assertForbidden();
});

test('authorized users can visit the users index', function (): void {
    $user = User::factory()->withPermission('view-users')->create();

    actingAs($user)
        ->get(route('admin.users.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the user edit page', function (): void {
    $user = User::factory()->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.edit', $userUpdated))
        ->assertForbidden();
});

test('authorized users can visit the user edit page', function (): void {
    $user = User::factory()->withPermission('edit-users')->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.edit', $userUpdated))
        ->assertOk();
});

test('unauthorized users cannot edit a user', function (): void {
    $user = User::factory()->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->patch(route('admin.users.update', $userUpdated), [
            'name' => 'Test User Update',
        ])
        ->assertForbidden();
});

test('authorized users can edit a user', function (): void {
    $user = User::factory()->withPermission('edit-users')->create();
    $userUpdate = User::factory()->create();

    actingAs($user)
        ->patch(route('admin.users.update', $userUpdate), [
            'name' => 'Test User Update',
        ])
        ->assertRedirect(route('admin.users.index'))
        ->assertSessionHas('toast');

    assertSame($userUpdate->fresh()?->name, 'Test User Update');
});

test('unauthorized users cannot visit the user role edit page', function (): void {
    $user = User::factory()->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.roles.edit', $userUpdated))
        ->assertForbidden();
});

test('authorized users can visit the user role edit page', function (): void {
    $user = User::factory()->withPermission('edit-user-roles')->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.roles.edit', $userUpdated))
        ->assertOk();
});

test('unauthorized users cannot edit user roles', function (): void {
    $user = User::factory()->create();
    $userUpdated = User::factory()->create();
    $roles = Role::factory()->count(3)->create();

    actingAs($user)
        ->patch(route('admin.users.roles.update', $userUpdated), [
            'roles' => $roles->map(fn ($role): array => ['id' => $role->id, 'checked' => true])->all(),
        ])
        ->assertForbidden();
});

test('authorized users can edit user roles', function (): void {
    $user = User::factory()->withPermission('edit-user-roles')->create();
    $userUpdate = User::factory()->create();
    $roles = Role::factory()->count(3)->create();

    actingAs($user)
        ->patch(route('admin.users.roles.update', $userUpdate), [
            'roles' => $roles->map(fn ($role): array => ['id' => $role->id, 'checked' => true])->all(),
        ])
        ->assertRedirect(route('admin.users.index'))
        ->assertSessionHas('toast');

    assertSame(
        $userUpdate->fresh()?->roles->pluck('id')->toArray(),
        $roles->pluck('id')->toArray()
    );
});

test('unauthorized users cannot visit the user permission edit page', function (): void {
    $user = User::factory()->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.permissions.edit', $userUpdated))
        ->assertForbidden();
});

test('authorized users can visit the user permission edit page', function (): void {
    $user = User::factory()->withPermission('edit-user-permissions')->create();
    $userUpdated = User::factory()->create();

    actingAs($user)
        ->get(route('admin.users.permissions.edit', $userUpdated))
        ->assertOk();
});

test('unauthorized users cannot edit user permissions', function (): void {
    $user = User::factory()->create();
    $userUpdated = User::factory()->create();
    $permissions = Permission::factory()->count(3)->create();

    actingAs($user)
        ->patch(route('admin.users.permissions.update', $userUpdated), [
            'permissions' => $permissions->map(fn ($permission): array => ['id' => $permission->id, 'checked' => true])->all(),
        ])
        ->assertForbidden();
});

test('authorized users can edit user permissions', function (): void {
    $user = User::factory()->withPermission('edit-user-permissions')->create();
    $userUpdate = User::factory()->create();
    $permissions = Permission::factory()->count(3)->create();

    actingAs($user)
        ->patch(route('admin.users.permissions.update', $userUpdate), [
            'permissions' => $permissions->map(fn ($permission): array => ['id' => $permission->id, 'checked' => true])->all(),
        ])
        ->assertRedirect(route('admin.users.index'))
        ->assertSessionHas('toast');

    assertSame(
        $userUpdate->fresh()?->permissions->pluck('id')->toArray(),
        $permissions->pluck('id')->toArray()
    );
});
