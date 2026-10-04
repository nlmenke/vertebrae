<?php
/**
 * Ensures the application adheres to a defined architecture.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Actions\Fortify\PasswordValidationRules;
use App\Exceptions\AbstractException;
use App\Http\Controllers\AbstractController;
use App\Http\Requests\AbstractFormRequest;
use App\Models\AbstractModel;
use App\Models\User;
use App\Policies\AbstractPolicy;
use App\Services\AbstractService;
use App\Services\Api\AbstractApiService;
use Database\Seeders\AbstractSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\AbstractTestCase;

arch()
    ->preset()
    ->php();

arch()
    ->preset()
    ->laravel()
    ->ignoring(AbstractModel::class); // has 'Model' suffix

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
        AbstractException::class,
        AbstractController::class,
        AbstractFormRequest::class,
        AbstractModel::class,
        AbstractPolicy::class,
        AbstractService::class,
        AbstractApiService::class,
        AbstractSeeder::class,
    ])
    ->toBeFinal()
    ->ignoring([
        PasswordValidationRules::class,
        AbstractException::class,
        AbstractController::class,
        AbstractFormRequest::class,
        AbstractModel::class,
        AbstractPolicy::class,
        AbstractService::class,
        AbstractApiService::class,
        AbstractSeeder::class,
    ]);

arch()
    ->expect(AbstractException::class)
    ->expect(AbstractController::class)
    ->expect(AbstractFormRequest::class)
    ->expect(AbstractModel::class)
    ->expect(AbstractPolicy::class)
    ->expect(AbstractService::class)
    ->expect(AbstractApiService::class)
    ->expect(AbstractSeeder::class)
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
    ->toExtend(AbstractException::class);

arch()
    ->expect('App\Http')
    ->toOnlyBeUsedIn('App\Http');

arch()
    ->expect('App\Http\Controllers')
    ->toHaveSuffix('Controller')
    ->toExtend(AbstractController::class)
    ->not->toBeUsed()
    ->ignoring(AbstractController::class);

arch()
    ->expect('App\Http\Requests')
    ->toHaveSuffix('Request')
    ->toExtend(AbstractFormRequest::class)
    ->toHaveMethod([
        'authorize',
        'rules',
    ]);

arch()
    ->expect('App\Models')
    ->not->toHaveSuffix('Model')
    ->ignoring(AbstractModel::class)
    ->toExtend(AbstractModel::class)
    ->ignoring(User::class)
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
    ->expect('App\Policies')
    ->toHaveSuffix('Policy')
    ->toExtend(AbstractPolicy::class);

arch()
    ->expect('App\Services')
    ->toHaveSuffix('Service')
    ->ignoring('App\Services\Api\ExchangeRates')
    ->toExtend(AbstractService::class)
    ->ignoring('App\Services\Api');

arch()
    ->expect('App\Services\Api')
    ->toHaveSuffix('Service')
    ->toExtend(AbstractApiService::class);

arch()
    ->expect('Database\Factories')
    ->toHaveSuffix('Factory')
    ->toExtend(Factory::class)
    ->toHaveMethod('definition')
    ->toOnlyBeUsedIn('App\Models');

arch()
    ->expect('Database\Seeders')
    ->toHaveSuffix('Seeder')
    ->toExtend(AbstractSeeder::class)
    ->ignoring(DatabaseSeeder::class)
    ->toOnlyBeUsedIn('Database\Seeders');

arch()
    ->expect('Tests')
    ->toHaveSuffix('Test')
    ->ignoring(AbstractTestCase::class)
    ->not->toBeClasses()
    ->ignoring(AbstractTestCase::class);
