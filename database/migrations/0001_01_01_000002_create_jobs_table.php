<?php
/**
 * Create Jobs Table migration.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Creates the database tables required for queued jobs.
 *
 * @since 0.0.0-framework introduced
 * @since 0.0.0-vertebrae add classname and table constants
 */
final class CreateJobsTable extends Migration
{
    /**
     * The main table used by the migration.
     */
    public const string TABLE = 'jobs';

    /**
     * The job batches table used by the migration.
     */
    public const string TABLE_BATCHES = 'job_batches';

    /**
     * The failed jobs table used by the migration.
     */
    public const string TABLE_FAILED = 'failed_jobs';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (config('queue.default') === 'database') {
            Schema::create('jobs', function (Blueprint $table): void {
                $table->id();
                $table->string('queue')->index();
                $table->longText('payload');
                $table->unsignedTinyInteger('attempts');
                $table->unsignedInteger('reserved_at')->nullable();
                $table->unsignedInteger('available_at');
                $table->unsignedInteger('created_at');
            });
        }

        Schema::create('job_batches', function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table): void {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (config('queue.default') === 'database') {
            Schema::dropIfExists('jobs');
        }

        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
}
