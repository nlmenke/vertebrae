<?php
/**
 * Ensures the application adheres to a defined architecture.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

arch()
    ->preset()
    ->php();

arch()
    ->preset()
    ->laravel()
    ->ignoring(App\Models\AbstractModel::class); // has 'Model' suffix

arch()
    ->preset()
    ->security();

arch()
    ->expect('App')
    ->toHaveMethodsDocumented()
    ->toHavePropertiesDocumented()
    ->toUseStrictEquality()
    ->toUseStrictTypes();

arch()
    ->expect('App')
    ->classes()
    ->not->toBeAbstract()
    ->ignoring([
        App\Http\Controllers\AbstractController::class,
        App\Http\Requests\AbstractFormRequest::class,
        App\Models\AbstractModel::class,
        App\Policies\AbstractPolicy::class,
        Database\Seeders\AbstractSeeder::class,
    ])
    ->toBeFinal()
    ->ignoring([
        App\Http\Controllers\AbstractController::class,
        App\Http\Requests\AbstractFormRequest::class,
        App\Models\AbstractModel::class,
        App\Policies\AbstractPolicy::class,
        Database\Seeders\AbstractSeeder::class,
    ]);

arch()
    ->expect(App\Http\Controllers\AbstractController::class)
    ->expect(App\Http\Requests\AbstractFormRequest::class)
    ->expect(App\Models\AbstractModel::class)
    ->expect(Database\Seeders\AbstractSeeder::class)
    ->toHavePrefix('Abstract')
    ->toBeAbstract()
    ->not->toBeFinal();

arch()
    ->expect('App\Http')
    ->toOnlyBeUsedIn('App\Http');

arch()
    ->expect('App\Http\Controllers')
    ->toHaveSuffix('Controller')
    ->toExtend(App\Http\Controllers\AbstractController::class)
    ->not->toBeUsed()
    ->ignoring(App\Http\Controllers\AbstractController::class);

arch()
    ->expect('App\Http\Requests')
    ->toHaveSuffix('Request')
    ->toExtend(App\Http\Requests\AbstractFormRequest::class)
    ->toHaveMethod([
        'authorize',
        'rules',
    ]);

arch()
    ->expect('App\Models')
    ->not->toHaveSuffix('Model')
    ->ignoring(App\Models\AbstractModel::class)
    ->toExtend(App\Models\AbstractModel::class)
    ->toHaveMethod('casts')
    ->toOnlyBeUsedIn([
        'App\Http',
        'App\Models',
        'App\Policies',
        'App\Providers',
        'Database\Factories',
        'Database\Seeders',
    ]);

arch()
    ->expect('App\Policies')
    ->toHaveSuffix('Policy')
    ->toExtend(App\Policies\AbstractPolicy::class);

arch()
    ->expect('Database\Factories')
    ->toHaveSuffix('Factory')
    ->toExtend(Illuminate\Database\Eloquent\Factories\Factory::class)
    ->toHaveMethod('definition')
    ->toOnlyBeUsedIn('App\Models');

arch()
    ->expect('Database\Seeders')
    ->toHaveSuffix('Seeder')
    ->toExtend(Database\Seeders\AbstractSeeder::class)
    ->ignoring(Database\Seeders\DatabaseSeeder::class)
    ->toHaveMethod('run');

arch()
    ->expect('Tests')
    ->toHaveSuffix('Test')
    ->ignoring(Tests\AbstractTestCase::class)
    ->not->toBeClasses()
    ->ignoring(Tests\AbstractTestCase::class);
