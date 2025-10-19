<?php
/**
 * Update Exchange Rates job.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Jobs\ExchangeRates;

use App\Managers\ExchangeRatesApiServiceManager;
use App\Models\Currency;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Handles updating currency exchange rates using an exchange rate API. It is
 * set to run quarterly by default. To use this job, you will need to get an
 * API key from one of the supported exchange rate services.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UpdateExchangeRatesJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Execute the job.
     *
     * @param EloquentCollection<int, Currency>|null $currencies
     * @param array<string, float>                   $exchangeRates
     */
    public function handle(
        ?EloquentCollection $currencies = null,
        array $exchangeRates = [],
    ): void {
        try {
            $currencies = $currencies?->isNotEmpty() ? $currencies : Currency::all();
            $exchangeRates = $exchangeRates !== [] ? $exchangeRates : app(ExchangeRatesApiServiceManager::class)->getExchangeRates();

            $currencies->each(function (Currency $currency) use ($exchangeRates): void {
                if (array_key_exists($currency->iso_alpha, $exchangeRates)) {
                    $currency->setAttribute('exchange_rate', $exchangeRates[$currency->iso_alpha]);
                    $currency->save();
                } else {
                    Log::warning(sprintf('Exchange rate for %s does not exist in the exchange rate database.', $currency->name));
                }
            });
        } catch (Throwable $throwable) {
            Log::error($throwable->getMessage());
        }
    }
}
