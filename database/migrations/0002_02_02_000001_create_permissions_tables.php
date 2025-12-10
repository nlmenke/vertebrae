<?php
/**
 * Create Permissions Tables migration.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database table required for Permission models as well as the
 * pivot tables used to associate permissions with roles and users.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CreatePermissionsTables extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'permissions';

    /**
     * The role pivot table used by the migration.
     */
    public const string TABLE_PIVOT_ROLE = 'permission_role';

    /**
     * The user pivot table used by the migration.
     */
    public const string TABLE_PIVOT_USER = 'permission_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create(self::TABLE_PIVOT_ROLE, function (Blueprint $table): void {
            $table->foreignId('permission_id')->constrained(self::TABLE)->cascadeOnDelete();
            $table->foreignId('role_id')->constrained(CreateRolesTables::TABLE)->cascadeOnDelete();

            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create(self::TABLE_PIVOT_USER, function (Blueprint $table): void {
            $table->foreignId('permission_id')->constrained(self::TABLE)->cascadeOnDelete();
            $table->foreignId('user_id')->constrained(CreateUsersTable::TABLE)->cascadeOnDelete();

            $table->primary(['permission_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_PIVOT_USER);
        Schema::dropIfExists(self::TABLE_PIVOT_ROLE);
        Schema::dropIfExists(self::TABLE);
    }
}
