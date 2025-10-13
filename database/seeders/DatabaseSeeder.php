<?php
/**
 * Database seeder.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * The default seeder fired when no seeder class is passed to the artisan
 * migrate / seed console commands.
 *
 * @since 0.0.0-framework introduced
 */
final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}
