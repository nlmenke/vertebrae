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
        'native',
        'script',
    ];

    /**
     * @return string
     */
    public function getIsoAlpha2(): string
    {
        return $this->getAttribute('iso_alpha_2');
    }

    /**
     * @return string
     */
    public function getIsoAlpha3(): string
    {
        return $this->getAttribute('iso_alpha_3');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @return string
     */
    public function getNative(): string
    {
        return $this->getAttribute('native');
    }

    /**
     * @return string
     */
    public function getScript(): string
    {
        return $this->getAttribute('script');
    }
}
