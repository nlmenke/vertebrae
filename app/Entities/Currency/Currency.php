<?php namespace App\Entities\Currency;

use App\Entities\AbstractEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

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
