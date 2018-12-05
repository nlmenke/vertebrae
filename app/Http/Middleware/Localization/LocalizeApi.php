<?php namespace App\Http\Middleware\Localization;

use App\Services\Localization\LocalizationService;
use Illuminate\Http\Request;

/**
 * Class LocalizeApi
 *
 * @package App\Http\Middleware\Localization
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LocalizeApi extends Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        // requested URL should be ignored
        if ($this->shouldIgnore($request)) {
            return $next($request);
        }

        $localizationService = app(LocalizationService::class);

        if ($locale = $request->header('Accept-Language')) {
            if ($localizationService->localeIsActive($locale)) {
                // set locale
                app()->setLocale($locale);
            } else {
                // remove the last segment of the submitted locale in attempt to find one that's valid
                $localeParts = explode('-', $locale);
                for ($i = count($localeParts); $i > 0; $i--) {
                    unset($localeParts[$i]);

                    $locale = implode('-', $localeParts);
                    if ($localizationService->localeIsActive($locale)) {
                        // set locale
                        app()->setLocale($locale);

                        break;
                    }
                }
            }
        }

        return $next($request);
    }
}
