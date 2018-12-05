<?php namespace App\Services\Localization;

use App\Entities\Locale\Locale;
use App\Exceptions\Localization\ActiveLocalesNotDefinedException;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class LocalizationService
 *
 * @package App\Services\Localization
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LocalizationService
{
    /**
     * Locales that can be used for translation.
     *
     * @var Locale[]|Collection
     */
    protected $activeLocales;

    /**
     * The locale entity instance.
     *
     * @var Locale[]|EloquentBuilder
     */
    protected $localeModel;

    /**
     * Create new service instance.
     *
     * @param Locale $localeModel
     * @return void
     * @throws ActiveLocalesNotDefinedException
     */
    public function __construct(Locale $localeModel)
    {
        $this->localeModel = $localeModel;

        $this->activeLocales = $this->getActiveLocales();
    }

    /**
     * Check if the locale exists in the active locales array.
     *
     * @param string|null $locale
     * @return bool
     */
    public function localeIsActive(string $locale = null): bool
    {
        if ($locale === null || !$this->activeLocales->has($locale)) {
            return false;
        }

        return true;
    }

    /**
     * Return an array of all active locales.
     *
     * @return Locale[]|Collection
     * @throws ActiveLocalesNotDefinedException
     */
    public function getActiveLocales()
    {
        if (!$this->activeLocales->isEmpty()) {
            return $this->activeLocales;
        }

        $locales = $this->localeModel->where('active', true)
            ->get()
            ->keyBy('code');

        if ($locales->isEmpty()) {
            throw new ActiveLocalesNotDefinedException;
        }

        $this->activeLocales = $locales;

        return $locales;
    }
}
