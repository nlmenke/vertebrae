<?php
/**
 * Add Two-Factor Columns to Users Table migration.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Features;

/**
 * Adds columns to the users table used for two-factor authentication.
 *
 * @since 0.0.0-framework introduced
 */
return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Features::canManageTwoFactorAuthentication()) {
            return;
        }

        Schema::table(CreateUsersTable::TABLE, function (Blueprint $table): void {
            $table->text('two_factor_secret')->nullable()->after('password');
            $table->text('two_factor_recovery_codes')->nullable()->after('two_factor_secret');
            $table->timestamp('two_factor_confirmed_at')->nullable()->after('two_factor_recovery_codes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Features::canManageTwoFactorAuthentication()) {
            return;
        }

        Schema::table(CreateUsersTable::TABLE, function (Blueprint $table): void {
            $table->dropColumn([
                'two_factor_secret',
                'two_factor_recovery_codes',
                'two_factor_confirmed_at',
            ]);
        });
    }
};
