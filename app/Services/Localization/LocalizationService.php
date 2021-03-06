<?php
/**
 * Localization Service.
 *
 * @package App\Services\Localization
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Services\Localization;

use App\Entities\Locale\Locale;
use App\Exceptions\Localization\ActiveLocalesNotDefinedException;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection;

/**
 * The Localization service class.
 *
 * This class handles retrieving active locales and localizing the application.
 *
 * @since x.x.x introduced
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
     *
     * @throws ActiveLocalesNotDefinedException
     *
     * @return void
     */
    public function __construct(Locale $localeModel)
    {
        $this->localeModel = $localeModel;

        $this->activeLocales = $this->getActiveLocales();
    }

    /**
     * Return an array of all active locales.
     *
     * @throws ActiveLocalesNotDefinedException
     *
     * @return Locale[]|Collection
     */
    public function getActiveLocales()
    {
        if ($this->activeLocales !== null && $this->activeLocales->isNotEmpty()) {
            return $this->activeLocales;
        }

        $locales = $this->localeModel->where('active', true)
            ->get()
            ->keyBy('code');

        if ($locales->isEmpty()) {
            throw new ActiveLocalesNotDefinedException();
        }

        $this->activeLocales = $locales;

        return $locales;
    }

    /**
     * Check if the locale exists in the active locales array.
     *
     * @param string|null $locale
     *
     * @return bool
     */
    public function localeIsActive(string $locale = null): bool
    {
        if ($locale === null || !$this->activeLocales->has($locale)) {
            return false;
        }

        return true;
    }
}
