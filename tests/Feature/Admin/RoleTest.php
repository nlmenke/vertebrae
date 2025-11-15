<?php
/**
 * Tests functionality related to the user role admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Laravel\seed;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;

beforeEach(fn () => seed(RoleSeeder::class));

test('guests are redirected to the login page', function (): void {
    get(route('admin.roles.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the role index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.roles.index'))
        ->assertForbidden();
});

test('authorized users can visit the role index', function (): void {
    $user = User::factory()->admin()->create();

    actingAs($user)
        ->get(route('admin.roles.index'))
        ->assertOk();

    $user = User::factory()->withPermission('view-roles')->create();

    actingAs($user)
        ->get(route('admin.roles.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the role create page', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.roles.create'))
        ->assertForbidden();
});

test('authorized users can visit the role create page', function (): void {
    $user = User::factory()->admin()->create();

    actingAs($user)
        ->get(route('admin.roles.create'))
        ->assertOk();

    $user = User::factory()->withPermission('create-roles')->create();

    actingAs($user)
        ->get(route('admin.roles.create'))
        ->assertOk();
});

test('unauthorized users cannot create a role', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('admin.roles.store'), [
            'name' => 'Test Role Create',
        ])
        ->assertForbidden();
});

test('authorized users can create a role', function (): void {
    $user = User::factory()->admin()->create();

    actingAs($user)
        ->post(route('admin.roles.store'), [
            'name' => 'Test Role Create',
        ])
        ->assertRedirect(route('admin.roles.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.created_successfully', [
                'value' => 'Test Role Create',
            ]),
        ]);

    assertDatabaseHas('roles', [
        'slug' => 'test-role-create',
        'name' => 'Test Role Create',
    ]);

    $user = User::factory()->withPermission('create-roles')->create();

    actingAs($user)
        ->post(route('admin.roles.store'), [
            'name' => 'Test Role Create 2',
        ])
        ->assertRedirect(route('admin.roles.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.created_successfully', [
                'value' => 'Test Role Create 2',
            ]),
        ]);

    assertDatabaseHas('roles', [
        'slug' => 'test-role-create-2',
        'name' => 'Test Role Create 2',
    ]);
});

test('unauthorized users cannot visit the role edit page', function (): void {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    actingAs($user)
        ->get(route('admin.roles.edit', $role))
        ->assertForbidden();
});

test('authorized users can visit the role edit page', function (): void {
    $user = User::factory()->admin()->create();
    $role = Role::query()->firstWhere('slug', 'admin');

    actingAs($user)
        ->get(route('admin.roles.edit', $role))
        ->assertOk();

    $role = Role::factory()->create();
    $user = User::factory()->withPermission('edit-roles')->create();

    actingAs($user)
        ->get(route('admin.roles.edit', $role))
        ->assertOk();
});

test('unauthorized users cannot edit a role', function (): void {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    actingAs($user)
        ->patch(route('admin.roles.update', $role), [
            'name' => 'Test Role Update',
        ])
        ->assertForbidden();
});

test('authorized users can edit a role', function (): void {
    $user = User::factory()->admin()->create();
    $role = Role::factory()->create();

    actingAs($user)
        ->patch(route('admin.roles.update', $role), [
            'slug' => 'test-role-update',
            'name' => 'Test Role Update',
        ])
        ->assertRedirect(route('admin.roles.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.updated_successfully', [
                'value' => 'Test Role Update',
            ]),
        ]);

    $updatedRole = $role->fresh();

    assertSame($updatedRole?->slug, 'test-role-update');
    assertSame($updatedRole?->name, 'Test Role Update');

    $user = User::factory()->withPermission('edit-roles')->create();

    actingAs($user)
        ->patch(route('admin.roles.update', $role), [
            'slug' => 'test-role-update-2',
            'name' => 'Test Role Update 2',
        ])
        ->assertRedirect(route('admin.roles.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.updated_successfully', [
                'value' => 'Test Role Update 2',
            ]),
        ]);

    $updatedRole = $role->fresh();

    assertSame($updatedRole?->slug, 'test-role-update-2');
    assertSame($updatedRole?->name, 'Test Role Update 2');
});

test('unauthorized users cannot delete a role', function (): void {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    actingAs($user)
        ->delete(route('admin.roles.destroy', $role))
        ->assertForbidden();
});

test('authorized users can delete a role', function (): void {
    $user = User::factory()->admin()->create();
    $role = Role::factory()->create();

    actingAs($user)
        ->delete(route('admin.roles.destroy', $role))
        ->assertRedirect(route('admin.roles.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.deleted_successfully', [
                'value' => $role->name,
            ]),
        ]);

    assertNull($role->fresh());
    assertDatabaseMissing($role);

    $user = User::factory()->withPermission('delete-roles')->create();
    $role = Role::factory()->create();

    actingAs($user)
        ->delete(route('admin.roles.destroy', $role))
        ->assertRedirect(route('admin.roles.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.deleted_successfully', [
                'value' => $role->name,
            ]),
        ]);

    assertNull($role->fresh());
    assertDatabaseMissing($role);
});
