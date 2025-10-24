<?php
/**
 * Locale model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\LocaleFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Represents a locale in the system.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 *
 * @property-read int                  $id
 * @property-read int                  $language_id
 * @property-read int|null             $country_id
 * @property-read int                  $script_id
 * @property-read string               $code
 * @property-read string               $native
 * @property-read bool                 $currency_symbol_first
 * @property-read string               $decimal_mark
 * @property-read string               $thousands_separator
 * @property-read bool                 $active
 * @property-read CarbonInterface      $created_at
 * @property-read CarbonInterface      $updated_at
 * @property-read CarbonInterface|null $deleted_at
 * @property-read Language             $language
 * @property-read Country|null         $country
 * @property-read Script               $script
 */
final class Locale extends AbstractModel
{
    /** @use HasFactory<LocaleFactory> */
    use HasFactory;

    use SoftDeletes;

    /**
     * The `country` relationship instance.
     *
     * @return BelongsTo<Country, $this>
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * The `language` relationship instance.
     *
     * @return BelongsTo<Language, $this>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * The `script` relationship instance.
     *
     * @return BelongsTo<Script, $this>
     */
    public function script(): BelongsTo
    {
        return $this->belongsTo(Script::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'currency_symbol_first' => 'boolean',
        ];
    }
}
