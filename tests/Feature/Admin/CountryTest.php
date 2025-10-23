<?php
/**
 * Tests functionality related to the country admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Country;
use App\Models\Currency;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertSame;

test('guests are redirected to the login page', function (): void {
    get(route('admin.countries.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the country index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.countries.index'))
        ->assertForbidden();
});

test('authorized users can visit the country index', function (): void {
    $user = User::factory()->withPermission('view-countries')->create();

    actingAs($user)
        ->get(route('admin.countries.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the country create page', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.countries.create'))
        ->assertForbidden();
});

test('authorized users can visit the country create page', function (): void {
    $user = User::factory()->withPermission('create-countries')->create();

    actingAs($user)
        ->get(route('admin.countries.create'))
        ->assertOk();
});

test('unauthorized users cannot create a country', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('admin.countries.store'), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Country Create',
        ])
        ->assertForbidden();
});

test('authorized users can create a country', function (): void {
    $user = User::factory()->withPermission('create-countries')->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->post(route('admin.countries.store'), [
            'currency_id' => $currency->id,
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Country Create',
        ])
        ->assertRedirect(route('admin.countries.index'));

    assertDatabaseHas('countries', [
        'currency_id' => $currency->id,
        'iso_alpha_2' => 'AA',
        'iso_alpha_3' => 'AAA',
        'iso_numeric' => '000',
        'name' => 'Test Country Create',
    ]);

    // test the relationship for model coverage
    $country = Country::query()->firstWhere('iso_alpha_2', 'AA');

    assertSame($country?->currency?->name, $currency->name);
});

test('unauthorized users cannot visit the country edit page', function (): void {
    $user = User::factory()->create();
    $country = Country::factory()->create();

    actingAs($user)
        ->get(route('admin.countries.edit', $country))
        ->assertForbidden();
});

test('authorized users can visit the country edit page', function (): void {
    $user = User::factory()->withPermission('edit-countries')->create();
    $country = Country::factory()->create();

    actingAs($user)
        ->get(route('admin.countries.edit', $country))
        ->assertOk();
});

test('unauthorized users cannot edit a country', function (): void {
    $user = User::factory()->create();
    $country = Country::factory()->create();

    actingAs($user)
        ->put(route('admin.countries.update', $country), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Country Update',
        ])
        ->assertForbidden();
});

test('authorized users can edit a country', function (): void {
    $user = User::factory()->withPermission('edit-countries')->create();
    $country = Country::factory()->create();

    actingAs($user)
        ->put(route('admin.countries.update', $country), [
            'iso_alpha_2' => 'AA',
            'iso_alpha_3' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Country Update',
        ])
        ->assertRedirect(route('admin.countries.index'));

    $updatedCountry = $country->fresh();

    assertSame($updatedCountry?->iso_alpha_2, 'AA');
    assertSame($updatedCountry?->iso_alpha_3, 'AAA');
    assertSame($updatedCountry?->iso_numeric, '000');
    assertSame($updatedCountry?->name, 'Test Country Update');
});

test('unauthorized users cannot delete a country', function (): void {
    $user = User::factory()->create();
    $country = Country::factory()->create();

    actingAs($user)
        ->delete(route('admin.countries.destroy', $country))
        ->assertForbidden();
});

test('authorized users can delete a country', function (): void {
    $user = User::factory()->withPermission('delete-countries')->create();
    $country = Country::factory()->create();

    actingAs($user)
        ->delete(route('admin.countries.destroy', $country))
        ->assertRedirect(route('admin.countries.index'));

    assertSoftDeleted($country);
});
