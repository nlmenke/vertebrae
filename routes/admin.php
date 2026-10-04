<?php
/**
 * Admin routes.
 *
 * These routes are included in the "web" routes file.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermissionController;
use App\Http\Controllers\Admin\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth',
    'verified',
])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::resource('roles', RoleController::class, ['except' => ['show']]);

        Route::resource('users', UserController::class, ['only' => ['index', 'edit', 'update']]);
        Route::prefix('users')
            ->name('users.')
            ->group(function (): void {
                Route::get('{user}/permissions', [UserPermissionController::class, 'edit'])
                    ->name('permissions.edit');
                Route::addRoute(['PUT', 'PATCH'], '{user}/permissions', [UserPermissionController::class, 'update'])
                    ->name('permissions.update');
                Route::get('{user}/roles', [UserRoleController::class, 'edit'])
                    ->name('roles.edit');
                Route::addRoute(['PUT', 'PATCH'], '{user}/roles', [UserRoleController::class, 'update'])
                    ->name('roles.update');
            });
    });
