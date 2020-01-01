<?php
/**
 * Country Entity.
 *
 * @package App\Entities\Country
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Entities\Country;

use App\Entities\AbstractEntity;
use App\Entities\Currency\Currency;
use App\Entities\Language\Language;
use App\Entities\Locale\Locale;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * The Country entity class.
 *
 * This class contains any functions required to access and manipulate country
 * models.
 *
 * @since x.x.x introduced
 */
class Country extends AbstractEntity
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_id',
        'iso_alpha_2',
        'iso_alpha_3',
        'iso_numeric',
        'name',
    ];

    /**
     * The currency relationship instance.
     *
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the currency attribute.
     *
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->getAttribute('currency');
    }

    /**
     * Get the iso_alpha_2 attribute.
     *
     * @return string
     */
    public function getIsoAlpha2(): string
    {
        return $this->getAttribute('iso_alpha_2');
    }

    /**
     * Get the iso_alpha_3 attribute.
     *
     * @return string
     */
    public function getIsoAlpha3(): string
    {
        return $this->getAttribute('iso_alpha_3');
    }

    /**
     * Get the iso_numeric attribute.
     *
     * @return string
     */
    public function getIsoNumeric(): string
    {
        return $this->getAttribute('iso_numeric');
    }

    /**
     * Get the name attribute.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * The languages relationship instance.
     *
     * @return HasManyThrough
     */
    public function languages(): HasManyThrough
    {
        return $this->hasManyThrough(Language::class, Locale::class, 'country_id', 'id', 'id', 'language_id');
    }
}
