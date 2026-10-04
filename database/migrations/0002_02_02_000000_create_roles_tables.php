<?php
/**
 * Create Roles Tables migration.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database table required for Role models as well as the pivot
 * table used to associate roles with users.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CreateRolesTables extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'roles';

    /**
     * The role <-> user pivot table used by the migration.
     */
    public const string TABLE_PIVOT = 'role_user';

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

        Schema::create(self::TABLE_PIVOT, function (Blueprint $table): void {
            $table->foreignId('role_id')->constrained(self::TABLE)->cascadeOnDelete();
            $table->foreignId('user_id')->constrained(CreateUsersTable::TABLE)->cascadeOnDelete();

            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_PIVOT);
        Schema::dropIfExists(self::TABLE);
    }
}
