<?php
/**
 * Application Console Kernel.
 *
 * @package App\Console
 *
 * @author    Taylor Otwell <taylor@laravel.com>
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\BuildPageFiles\BuildPageFilesCommand;
use App\Jobs\UpdateExchangeRates;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * The console kernel class.
 *
 * The console kernel is responsible for registering commands for use and
 * scheduling various commands and tasks.
 *
 * @since 0.0.0-framework introduced
 * @since x.x.x           skeleton commands/jobs
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        BuildPageFilesCommand::class,
    ];

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new UpdateExchangeRates())->quarterly();
    }
}
