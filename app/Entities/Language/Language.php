<?php namespace App\Entities\Language;

use App\Entities\AbstractEntity;
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
