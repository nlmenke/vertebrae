<?php
/**
 * Country model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Represents a country in the system.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 *
 * @property-read int                               $id
 * @property-read int|null                          $currency_id
 * @property-read string                            $iso_alpha_2
 * @property-read string                            $iso_alpha_3
 * @property-read string                            $iso_numeric
 * @property-read string                            $name
 * @property-read CarbonInterface                   $created_at
 * @property-read CarbonInterface                   $updated_at
 * @property-read CarbonInterface|null              $deleted_at
 * @property-read Currency|null                     $currency
 * @property-read EloquentCollection<int, Language> $languages
 * @property-read EloquentCollection<int, Locale>   $locales
 */
final class Country extends AbstractModel
{
    /** @use HasFactory<CountryFactory> */
    use HasFactory;

    use SoftDeletes;

    /**
     * The `currency` relationship instance.
     *
     * @return BelongsTo<Currency, $this>
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * The `languages` relationship instance.
     *
     * @return HasManyThrough<Language, Locale, $this>
     */
    public function languages(): HasManyThrough
    {
        return $this->hasManyThrough(Language::class, Locale::class, 'country_id', 'id', null, 'language_id');
    }

    /**
     * The `locales` relationship instance.
     *
     * @return HasMany<Locale, $this>
     */
    public function locales(): HasMany
    {
        return $this->hasMany(Locale::class);
    }
}
