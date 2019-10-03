<?php declare(strict_types=1);

namespace App\Entities\Language;

use App\Entities\AbstractEntity;
use App\Entities\Country\Country;
use App\Entities\Locale\Locale;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 *
 * @package App\Entities\Language
 * @author  Nick Menke <nick@nlmenke.net>
 */
class Language extends AbstractEntity
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso_alpha_2',
        'iso_alpha_3',
        'name',
    ];

    /**
     * The country relationship instance.
     *
     * @return HasManyThrough
     */
    public function countries(): HasManyThrough
    {
        return $this->hasManyThrough(Country::class, Locale::class, 'language_id', 'id', 'id', 'country_id');
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
     * Get the name attribute.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }
}
