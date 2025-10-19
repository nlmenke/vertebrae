<?php
/**
 * Tests functionality related to the currency admin pages.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Models\Currency;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertSame;

test('guests are redirected to the login page', function (): void {
    get(route('admin.currencies.index'))
        ->assertRedirect(route('login'));
});

test('unauthorized users cannot visit the currency index', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.currencies.index'))
        ->assertforbidden();
});

test('authorized users can visit the currency index', function (): void {
    $user = User::factory()->withPermission('view-currencies')->create();

    actingAs($user)
        ->get(route('admin.currencies.index'))
        ->assertOk();
});

test('unauthorized users cannot visit the currency create page', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.currencies.create'))
        ->assertForbidden();
});

test('authorized users can visit the currency create page', function (): void {
    $user = User::factory()->withPermission('create-currencies')->create();

    actingAs($user)
        ->get(route('admin.currencies.create'))
        ->assertOk();
});

test('unauthorized users cannot create a currency', function (): void {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('admin.currencies.store'), [
            'iso_alpha' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Currency Create',
            'symbol' => '%',
            'decimal_precision' => '1',
            'exchange_rate' => '2',
        ])
        ->assertForbidden();
});

test('authorized users can create a currency', function (): void {
    $user = User::factory()->withPermission('create-currencies')->create();

    actingAs($user)
        ->post(route('admin.currencies.store'), [
            'iso_alpha' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Currency Create',
            'symbol' => '%',
            'decimal_precision' => '1',
            'exchange_rate' => '2',
        ])
        ->assertRedirect(route('admin.currencies.index'));

    assertDatabaseHas('currencies', [
        'iso_alpha' => 'AAA',
        'iso_numeric' => '000',
        'name' => 'Test Currency Create',
        'symbol' => '%',
        'decimal_precision' => '1',
        'exchange_rate' => '2',
    ]);
});

test('unauthorized users cannot visit the currency edit page', function (): void {
    $user = User::factory()->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->get(route('admin.currencies.edit', $currency))
        ->assertForbidden();
});

test('authorized users can visit the currency edit page', function (): void {
    $user = User::factory()->withPermission('edit-currencies')->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->get(route('admin.currencies.edit', $currency))
        ->assertOk();
});

test('unauthorized users cannot edit a currency', function (): void {
    $user = User::factory()->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->put(route('admin.currencies.update', $currency), [
            'iso_alpha' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Currency Update',
            'symbol' => '#',
            'decimal_precision' => '1',
            'exchange_rate' => '1',
        ])
        ->assertForbidden();
});

test('authorized users can edit a currency', function (): void {
    $user = User::factory()->withPermission('edit-currencies')->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->put(route('admin.currencies.update', $currency), [
            'iso_alpha' => 'AAA',
            'iso_numeric' => '000',
            'name' => 'Test Currency Update',
            'symbol' => '#',
            'decimal_precision' => '1',
            'exchange_rate' => '1',
        ])
        ->assertRedirect(route('admin.currencies.index'));

    $updatedCurrency = $currency->fresh();

    assertSame($updatedCurrency?->iso_alpha, 'AAA');
    assertSame($updatedCurrency?->iso_numeric, '000');
    assertSame($updatedCurrency?->name, 'Test Currency Update');
    assertSame($updatedCurrency?->symbol, '#');
    assertSame($updatedCurrency?->decimal_precision, 1);
    assertSame($updatedCurrency?->exchange_rate, '1.000000');
});

test('unauthorized users cannot delete a currency', function (): void {
    $user = User::factory()->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->delete(route('admin.currencies.destroy', $currency))
        ->assertForbidden();
});

test('authorized users can delete a currency', function (): void {
    $user = User::factory()->withPermission('delete-currencies')->create();
    $currency = Currency::factory()->create();

    actingAs($user)
        ->delete(route('admin.currencies.destroy', $currency))
        ->assertRedirect(route('admin.currencies.index'));

    assertSoftDeleted($currency);
});
