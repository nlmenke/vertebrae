<?php
/**
 * Tests functionality related to the locale admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Country;
use App\Models\Language;
use App\Models\Locale;
use App\Models\Script;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertSame;

test('guests are redirected to the login page', function (): void {
    get(route('admin.locales.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the locale index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.locales.index'))
        ->assertForbidden();
});

test('authorized users can visit the locale index', function (): void {
    $user = User::factory()->withPermission('view-locales')->create();

    actingAs($user)
        ->get(route('admin.locales.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the locale create page', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.locales.create'))
        ->assertForbidden();
});

test('authorized users can visit the locale create page', function (): void {
    $user = User::factory()->withPermission('create-locales')->create();

    actingAs($user)
        ->get(route('admin.locales.create'))
        ->assertOk();
});

test('unauthorized users cannot create a locale', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('admin.locales.store'), [
            'country_id' => Country::factory()->create()->id,
            'language_id' => Language::factory()->create()->id,
            'script_id' => Script::factory()->create()->id,
            'code' => 'aa',
            'native' => 'Test Locale Create',
            'decimal_mark' => '.',
            'thousands_separator' => ',',
            'currency_symbol_first' => false,
            'active' => false,
        ])
        ->assertForbidden();
});

test('authorized users can create a locale', function (): void {
    $user = User::factory()->withPermission('create-locales')->create();
    $country = Country::factory()->create();
    $language = Language::factory()->create();
    $script = Script::factory()->create();

    actingAs($user)
        ->post(route('admin.locales.store'), [
            'country_id' => $country->id,
            'language_id' => $language->id,
            'script_id' => $script->id,
            'code' => 'aa',
            'native' => 'Test Locale Create',
            'decimal_mark' => '.',
            'thousands_separator' => ',',
            'currency_symbol_first' => false,
            'active' => false,
        ])
        ->assertRedirect(route('admin.locales.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => 'Test Locale Create was created successfully.',
        ]);

    assertDatabaseHas('locales', [
        'country_id' => $country->id,
        'language_id' => $language->id,
        'script_id' => $script->id,
        'code' => 'aa',
        'native' => 'Test Locale Create',
        'decimal_mark' => '.',
        'thousands_separator' => ',',
        'currency_symbol_first' => false,
        'active' => false,
    ]);

    // test the relationship for model coverage
    $locale = Locale::query()->firstWhere('code', 'aa');

    assertSame($locale?->country?->name, $country->name);
    assertSame($locale?->language?->name, $language->name);
    assertSame($locale?->script?->name, $script->name);
});

test('unauthorized users cannot visit the locale edit page', function (): void {
    $user = User::factory()->create();
    $locale = Locale::factory()->create();

    actingAs($user)
        ->get(route('admin.locales.edit', $locale))
        ->assertForbidden();
});

test('authorized users can visit the locale edit page', function (): void {
    $user = User::factory()->withPermission('edit-locales')->create();
    $locale = Locale::factory()->create();

    actingAs($user)
        ->get(route('admin.locales.edit', $locale))
        ->assertOk();
});

test('unauthorized users cannot edit a locale', function (): void {
    $user = User::factory()->create();
    $locale = Locale::factory()->create();

    actingAs($user)
        ->patch(route('admin.locales.update', $locale), [
            'code' => 'aa',
            'native' => 'Test Locale Update',
            'decimal_mark' => '.',
            'thousands_separator' => ',',
            'currency_symbol_first' => false,
            'active' => false,
        ])
        ->assertForbidden();
});

test('authorized users can edit a locale', function (): void {
    $user = User::factory()->withPermission('edit-locales')->create();
    $locale = Locale::factory()->create();

    actingAs($user)
        ->patch(route('admin.locales.update', $locale), [
            'code' => 'aa',
            'native' => 'Test Locale Update',
            'decimal_mark' => '.',
            'thousands_separator' => ',',
            'currency_symbol_first' => false,
            'active' => false,
        ])
        ->assertRedirect(route('admin.locales.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => 'Test Locale Update was updated successfully.',
        ]);

    $updatedLocale = $locale->fresh();

    assertSame($updatedLocale?->code, 'aa');
    assertSame($updatedLocale?->native, 'Test Locale Update');
    assertSame($updatedLocale?->decimal_mark, '.');
    assertSame($updatedLocale?->thousands_separator, ',');
    assertSame($updatedLocale?->currency_symbol_first, false);
    assertSame($updatedLocale?->active, false);
});

test('unauthorized users cannot delete a locale', function (): void {
    $user = User::factory()->create();
    $locale = Locale::factory()->create();

    actingAs($user)
        ->delete(route('admin.locales.destroy', $locale))
        ->assertForbidden();
});

test('authorized users can delete a locale', function (): void {
    $user = User::factory()->withPermission('delete-locales')->create();
    $locale = Locale::factory()->create();

    actingAs($user)
        ->delete(route('admin.locales.destroy', $locale))
        ->assertRedirect(route('admin.locales.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => $locale->native . ' was deleted successfully.',
        ]);

    assertSoftDeleted($locale);
});
