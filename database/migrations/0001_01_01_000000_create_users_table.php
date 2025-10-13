<?php
/**
 * Create Users Table migration.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database tables required for User models.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae add classname and table constants
 */
final class CreateUsersTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'users';

    /**
     * The password reset tokens table used by the migration.
     */
    public const string TABLE_RESET = 'password_reset_tokens';

    /**
     * The sessions table used by the migration.
     */
    public const string TABLE_SESSIONS = 'sessions';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create(self::TABLE_RESET, function (Blueprint $table): void {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        if (config('session.driver') !== 'database') {
            return;
        }

        Schema::create(self::TABLE_SESSIONS, function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
        Schema::dropIfExists(self::TABLE_RESET);

        if (config('session.driver') !== 'database') {
            return;
        }

        Schema::dropIfExists(self::TABLE_SESSIONS);
    }
}
