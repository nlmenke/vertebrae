<?php
/**
 * Tests functionality related to the script admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Locale;
use App\Models\Script;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

test('guests are redirected to the login page', function (): void {
    get(route('admin.scripts.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the script index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.scripts.index'))
        ->assertForbidden();
});

test('authorized users can visit the script index', function (): void {
    $user = User::factory()->withPermission('view-scripts')->create();

    actingAs($user)
        ->get(route('admin.scripts.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the script create page', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.scripts.create'))
        ->assertForbidden();
});

test('authorized users can visit the script create page', function (): void {
    $user = User::factory()->withPermission('create-scripts')->create();

    actingAs($user)
        ->get(route('admin.scripts.create'))
        ->assertOk();
});

test('unauthorized users cannot create a script', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('admin.scripts.store'), [
            'iso_alpha' => 'Aaaa',
            'iso_numeric' => '000',
            'name' => 'Test Script Create',
            'direction' => 'ltr',
        ])
        ->assertForbidden();
});

test('authorized users can create a script', function (): void {
    $user = User::factory()->withPermission('create-scripts')->create();

    actingAs($user)
        ->post(route('admin.scripts.store'), [
            'iso_alpha' => 'Aaaa',
            'iso_numeric' => '000',
            'name' => 'Test Script Create',
            'direction' => 'ltr',
        ])
        ->assertRedirect(route('admin.scripts.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => 'Test Script Create was created successfully.',
        ]);

    assertDatabaseHas('scripts', [
        'iso_alpha' => 'Aaaa',
        'iso_numeric' => '000',
        'name' => 'Test Script Create',
        'direction' => 'ltr',
    ]);

    // test the relationship for model coverage
    $script = Script::query()->firstWhere('iso_alpha', 'Aaaa');
    $locale = Locale::factory()->create(['script_id' => $script?->id]);

    assertTrue($script?->locales->contains($locale));
});

test('unauthorized users cannot visit the script edit page', function (): void {
    $user = User::factory()->create();
    $script = Script::factory()->create();

    actingas($user)
        ->get(route('admin.scripts.edit', $script))
        ->assertForbidden();
});

test('authorized users can visit the script edit page', function (): void {
    $user = User::factory()->withPermission('edit-scripts')->create();
    $script = Script::factory()->create();

    actingas($user)
        ->get(route('admin.scripts.edit', $script))
        ->assertOk();
});

test('unauthorized users cannot edit a script', function (): void {
    $user = User::factory()->create();
    $script = Script::factory()->create();

    actingAs($user)
        ->patch(route('admin.scripts.update', $script), [
            'iso_alpha' => 'Aaaa',
            'iso_numeric' => '000',
            'name' => 'Test Script Update',
            'direction' => 'ltr',
        ])
        ->assertForbidden();
});

test('authorized users can edit a script', function (): void {
    $user = User::factory()->withPermission('edit-scripts')->create();
    $script = Script::factory()->create();

    actingAs($user)
        ->patch(route('admin.scripts.update', $script), [
            'iso_alpha' => 'Aaaa',
            'iso_numeric' => '000',
            'name' => 'Test Script Update',
            'direction' => 'ltr',
        ])
        ->assertRedirect(route('admin.scripts.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => 'Test Script Update was updated successfully.',
        ]);

    $updatedScript = $script->fresh();

    assertSame($updatedScript?->iso_alpha, 'Aaaa');
    assertSame($updatedScript?->iso_numeric, '000');
    assertSame($updatedScript?->name, 'Test Script Update');
    assertSame($updatedScript?->direction, 'ltr');
});

test('unauthorized users cannot delete a script', function (): void {
    $user = User::factory()->create();
    $script = Script::factory()->create();

    actingAs($user)
        ->delete(route('admin.scripts.destroy', $script))
        ->assertForbidden();
});

test('authorized users can delete a script', function (): void {
    $user = User::factory()->withPermission('delete-scripts')->create();
    $script = Script::factory()->create();

    actingAs($user)
        ->delete(route('admin.scripts.destroy', $script))
        ->assertRedirect(route('admin.scripts.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => $script->name . ' was deleted successfully.',
        ]);

    assertSoftDeleted($script);
});
