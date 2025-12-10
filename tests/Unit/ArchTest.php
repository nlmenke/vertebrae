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
    ->php()
    ->ignoring([
        Database\Seeders\CurrencySeeder::class, // some currency symbols contain 'suspicious' characters
        Database\Seeders\LocaleSeeder::class, // some locale natives contain 'suspicious' characters
    ]);

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
        App\Exceptions\AbstractException::class,
        App\Http\Controllers\AbstractController::class,
        App\Http\Requests\AbstractFormRequest::class,
        App\Models\AbstractModel::class,
        App\Policies\AbstractPolicy::class,
        App\Services\AbstractService::class,
        App\Services\Api\AbstractApiService::class,
        Database\Seeders\AbstractSeeder::class,
    ])
    ->toBeFinal()
    ->ignoring([
        App\Actions\Fortify\PasswordValidationRules::class,
        App\Exceptions\AbstractException::class,
        App\Http\Controllers\AbstractController::class,
        App\Http\Requests\AbstractFormRequest::class,
        App\Models\AbstractModel::class,
        App\Policies\AbstractPolicy::class,
        'App\Interfaces',
        App\Services\AbstractService::class,
        App\Services\Api\AbstractApiService::class,
        Database\Seeders\AbstractSeeder::class,
    ]);

arch()
    ->expect(App\Exceptions\AbstractException::class)
    ->expect(App\Http\Controllers\AbstractController::class)
    ->expect(App\Http\Requests\AbstractFormRequest::class)
    ->expect(App\Models\AbstractModel::class)
    ->expect(App\Policies\AbstractPolicy::class)
    ->expect(App\Services\AbstractService::class)
    ->expect(App\Services\Api\AbstractApiService::class)
    ->expect(Database\Seeders\AbstractSeeder::class)
    ->toHavePrefix('Abstract')
    ->toBeAbstract()
    ->not->toBeFinal();

arch()
    ->expect('App\Actions')
    ->toHaveMethod('handle')
    ->ignoring('App\Actions\Fortify');

arch()
    ->expect('App\Exceptions')
    ->toHaveSuffix('Exception')
    ->toExtend(App\Exceptions\AbstractException::class);

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
    ->expect('App\Jobs')
    ->toHaveSuffix('Job')
    ->toHaveMethod('handle');

arch()
    ->expect('App\Models')
    ->not->toHaveSuffix('Model')
    ->ignoring(App\Models\AbstractModel::class)
    ->toExtend(App\Models\AbstractModel::class)
    ->ignoring(App\Models\User::class)
    ->toHaveMethod('casts')
    ->toOnlyBeUsedIn([
        'App\Actions',
        'App\Http',
        'App\Jobs',
        'App\Models',
        'App\Policies',
        'App\Providers',
        'App\Services',
        'Database\Factories',
        'Database\Seeders',
    ]);

arch()
    ->expect('App\Interfaces')
    ->toHaveSuffix('Interface')
    ->toBeInterfaces();

arch()
    ->expect('App\Managers')
    ->toHaveSuffix('Manager')
    ->toExtend(Illuminate\Support\Manager::class);

arch()
    ->expect('App\Policies')
    ->toHaveSuffix('Policy')
    ->toExtend(App\Policies\AbstractPolicy::class);

arch()
    ->expect('App\Services')
    ->toHaveSuffix('Service')
    ->ignoring('App\Services\Api\ExchangeRates')
    ->toExtend(App\Services\AbstractService::class)
    ->ignoring('App\Services\Api');

arch()
    ->expect('App\Services\Api')
    ->toHaveSuffix('Service')
    ->toExtend(App\Services\Api\AbstractApiService::class);

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
    ->toOnlyBeUsedIn('Database\Seeders');

arch()
    ->expect('Tests')
    ->toHaveSuffix('Test')
    ->ignoring(Tests\AbstractTestCase::class)
    ->not->toBeClasses()
    ->ignoring(Tests\AbstractTestCase::class);
