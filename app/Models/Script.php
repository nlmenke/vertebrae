<?php
/**
 * Script model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\ScriptFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Represents a script in the system.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 *
 * @property-read int                             $id
 * @property-read string                          $iso_alpha
 * @property-read string                          $iso_numeric
 * @property-read string                          $name
 * @property-read string                          $direction
 * @property-read CarbonInterface                 $created_at
 * @property-read CarbonInterface                 $updated_at
 * @property-read CarbonInterface|null            $deleted_at
 * @property-read EloquentCollection<int, Locale> $locales
 */
final class Script extends AbstractModel
{
    /** @use HasFactory<ScriptFactory> */
    use HasFactory;

    use SoftDeletes;

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
