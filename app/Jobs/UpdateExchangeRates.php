<?php
/**
 * Update Exchange Rates.
 *
 * @package App\Jobs
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2023 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Jobs;

use App\Entities\Currency\Currency;
use App\Services\Api\Currency\OpenExchangeRatesApiService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

/**
 * The Update Exchange Rates job class.
 *
 * This class updates currency exchange rates using the Open Exchange Rates
 * API. It is set to run quarterly by default. To utilize this job, you will
 * need to create an OXR account, which has a free tier for up to 1000
 * requests/month:
 *  - https://openexchangerates.org/
 *
 * @since x.x.x introduced
 */
class UpdateExchangeRates implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $exchangeRatesApiService = app(OpenExchangeRatesApiService::class);

            $currencies = Currency::all();
            $exchangeRates = $exchangeRatesApiService->get('latest.json', null, ['base' => config('currency.default')]);

            $currencies->each(function (Currency $currency) use ($exchangeRates): void {
                if (array_key_exists($currency->getIsoAlpha(), $exchangeRates['rates'])) {
                    $currency->setAttribute('exchange_rate', $exchangeRates['rates'][$currency->getIsoAlpha()]);
                    $currency->save();
                } else {
                    Log::warning('Exchange rate for ' . $currency->getName() . ' does not exist in the OXR database');
                }
            });
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
