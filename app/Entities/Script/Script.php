<?php namespace App\Entities\Script;

use App\Entities\AbstractEntity;
use App\Entities\Locale\Locale;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Script
 *
 * @package App\Entities\Script
 * @author  Nick Menke <nick@nlmenke.net>
 */
class Script extends AbstractEntity
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
        'direction',
    ];

    /**
     * The locales relationship instance.
     *
     * @return HasMany
     */
    public function locales(): HasMany
    {
        return $this->hasMany(Locale::class);
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
     * Get the direction attribute.
     *
     * @return string
     */
    public function getDirection(): string
    {
        return $this->getAttribute('direction');
    }
}
