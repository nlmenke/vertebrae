<?php declare(strict_types=1);

namespace App\Entities\Currency;

use App\Entities\AbstractEntity;
use App\Entities\Country\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 *
 * @package App\Entities\Currency
 * @author  Nick Menke <nick@nlmenke.net>
 */
class Currency extends AbstractEntity
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso_alpha',
        'iso_numeric',
        'name',
        'symbol',
        'decimal_precision',
        'exchange_rate',
    ];

    /**
     * The countries relationship instance.
     *
     * @return HasMany
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }

    /**
     * Get the countries attribute.
     *
     * @return Country[]|Collection
     */
    public function getCountries()
    {
        return $this->getAttribute('countries');
    }

    /**
     * Get the decimal_precision attribute.
     *
     * @return int
     */
    public function getDecimalPrecision(): int
    {
        return $this->getAttribute('decimal_precision');
    }

    /**
     * Get the exchange_rate attribute.
     *
     * @return float
     */
    public function getExchangeRate(): float
    {
        return $this->getAttribute('exchange_rate');
    }

    /**
     * Get the iso_alpha attribute.
     *
     * @return string
     */
    public function getIsoAlpha(): string
    {
        return $this->getAttribute('iso_alpha');
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
     * Get the symbol attribute.
     *
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->getAttribute('symbol');
    }
}
