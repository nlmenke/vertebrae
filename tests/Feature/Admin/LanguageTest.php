<?php
/**
 * Tests functionality related to the language admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Country;
use App\Models\Language;
use App\Models\Locale;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

test('guests are redirected to the login page', function (): void {
    get(route('admin.languages.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the language index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.languages.index'))
        ->assertForbidden();
});

test('authorized users can visit the language index', function (): void {
    $user = User::factory()->withPermission('view-languages')->create();

    actingAs($user)
        ->get(route('admin.languages.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the language create page', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.languages.create'))
        ->assertForbidden();
});

test('authorized users can visit the language create page', function (): void {
    $user = User::factory()->withPermission('create-languages')->create();

    actingAs($user)
        ->get(route('admin.languages.create'))
        ->assertOk();
});

test('unauthorized users cannot create a language', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('admin.languages.store'), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'name' => 'Test Language Create',
        ])
        ->assertForbidden();
});

test('authorized users can create a language', function (): void {
    $user = User::factory()->withPermission('create-languages')->create();

    actingAs($user)
        ->post(route('admin.languages.store'), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'name' => 'Test Language Create',
        ])
        ->assertRedirect(route('admin.languages.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.created_successfully', [
                'value' => 'Test Language Create',
            ]),
        ]);

    assertDatabaseHas('languages', [
        'iso_alpha_2' => 'AA',
        'iso_alpha_3' => 'AAA',
        'name' => 'Test Language Create',
    ]);

    // test the relationship for model coverage
    $language = Language::query()->firstWhere('iso_alpha_2', 'AA');
    $country = Country::factory()->create();
    $locale = Locale::factory()->create(['language_id' => $language?->id, 'country_id' => $country->id]);

    assertTrue($language?->countries->contains($country));
    assertTrue($language->locales->contains($locale));
});

test('unauthorized users cannot visit the language edit page', function (): void {
    $user = User::factory()->create();
    $language = Language::factory()->create();

    actingAs($user)
        ->get(route('admin.languages.edit', $language))
        ->assertForbidden();
});

test('authorized users can visit the language edit page', function (): void {
    $user = User::factory()->withPermission('edit-languages')->create();
    $language = Language::factory()->create();

    actingAs($user)
        ->get(route('admin.languages.edit', $language))
        ->assertOk();
});

test('unauthorized users cannot edit a language', function (): void {
    $user = User::factory()->create();
    $language = Language::factory()->create();

    actingAs($user)
        ->patch(route('admin.languages.update', $language), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'name' => 'Test Language Update',
        ])
        ->assertForbidden();
});

test('authorized users can edit a language', function (): void {
    $user = User::factory()->withPermission('edit-languages')->create();
    $language = Language::factory()->create();

    actingAs($user)
        ->patch(route('admin.languages.update', $language), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'name' => 'Test Language Update',
        ])
        ->assertRedirect(route('admin.languages.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.updated_successfully', [
                'value' => 'Test Language Update',
            ]),
        ]);

    $updatedLanguage = $language->fresh();

    assertSame($updatedLanguage?->iso_alpha_2, 'AA');
    assertSame($updatedLanguage?->iso_alpha_3, 'AAA');
    assertSame($updatedLanguage?->name, 'Test Language Update');
});

test('unauthorized users cannot delete a language', function (): void {
    $user = User::factory()->create();
    $language = Language::factory()->create();

    actingAs($user)
        ->delete(route('admin.languages.destroy', $language))
        ->assertForbidden();
});

test('authorized users can delete a language', function (): void {
    $user = User::factory()->withPermission('delete-languages')->create();
    $language = Language::factory()->create();

    actingAs($user)
        ->delete(route('admin.languages.destroy', $language))
        ->assertRedirect(route('admin.languages.index'))
        ->assertSessionHas('toast', [
            'style' => 'success',
            'message' => trans('common.deleted_successfully', [
                'value' => $language->name,
            ]),
        ]);

    assertSoftDeleted($language);
});
