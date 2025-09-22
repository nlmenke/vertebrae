<?php

/**
 * Locale Entity.
 *
 * @package App\Entities\Locale
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Entities\Locale;

use App\Entities\AbstractEntity;
use App\Entities\Country\Country;
use App\Entities\Language\Language;
use App\Entities\Script\Script;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * The Locale entity class.
 *
 * This class contains any functions required to access and manipulate locale
 * models.
 *
 * @since x.x.x introduced
 */
class Locale extends AbstractEntity
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'language_id',
        'script_id',
        'code',
        'native',
        'currency_symbol_first',
        'decimal_mark',
        'thousands_separator',
        'active',
    ];

    /**
     * The country relationship instance.
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the code attribute.
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->getAttribute('code');
    }

    /**
     * Get the country attribute.
     *
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->getAttribute('country');
    }

    /**
     * Get the currency_symbol_first attribute.
     *
     * @return bool
     */
    public function getCurrencySymbolFirst(): bool
    {
        return $this->getAttribute('currency_symbol_first');
    }

    /**
     * Get the decimal_mark attribute.
     *
     * @return string
     */
    public function getDecimalMark(): string
    {
        return $this->getAttribute('decimal_mark');
    }

    /**
     * Get the language attribute.
     *
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->getAttribute('language');
    }

    /**
     * Get the native attribute.
     *
     * @return string
     */
    public function getNative(): string
    {
        return $this->getAttribute('native');
    }

    /**
     * Get the script attribute.
     *
     * @return Script
     */
    public function getScript(): Script
    {
        return $this->getAttribute('script');
    }

    /**
     * Get the thousands_separator attribute.
     *
     * @return string
     */
    public function getThousandsSeparator(): string
    {
        return $this->getAttribute('thousands_separator');
    }

    /**
     * Check whether the locale is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->getAttribute('active');
    }

    /**
     * The language relationship instance.
     *
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * The script relationship instance.
     *
     * @return BelongsTo
     */
    public function script(): BelongsTo
    {
        return $this->belongsTo(Script::class);
    }
}
