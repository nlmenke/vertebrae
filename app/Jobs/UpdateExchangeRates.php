<?php namespace App\Jobs;

use App\Entities\Currency\Currency;
use App\Services\Api\Currency\OpenExchangeRatesApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class UpdateExchangeRates
 *
 * @package App\Jobs
 * @author  Nick Menke <nick@nlmenke.net>
 */
class UpdateExchangeRates implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $exchangeRatesApiService = app(OpenExchangeRatesApiService::class);

        $currencies = Currency::all();
        $exchangeRates = $exchangeRatesApiService->get('latest.json', null, ['base' => config('currency.default')]);

        $currencies->each(function (Currency $currency) use ($exchangeRates) {
            if (array_key_exists($currency->getIsoAlpha(), $exchangeRates['rates'])) {
                $currency->setAttribute('exchange_rate', $exchangeRates['rates'][$currency->getIsoAlpha()]);
                $currency->save();
            } else {
                \Log::warning('Exchange rate for ' . $currency->getName() . ' does not exist in the OXR database');
            }
        });
    }
}
