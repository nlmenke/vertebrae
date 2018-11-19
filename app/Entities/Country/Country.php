<?php namespace App\Entities\Country;

use App\Entities\AbstractEntity;
use App\Entities\Currency\Currency;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 *
 * @package App\Entities\Country
 * @author  Nick Menke <nick@nlmenke.net>
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
    public function getCurrency()
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
}