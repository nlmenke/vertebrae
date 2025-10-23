<?php
/**
 * Language model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\LanguageFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Represents a language in the system.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 *
 * @property-read int                  $id
 * @property-read string               $iso_alpha_2
 * @property-read string               $iso_alpha_3
 * @property-read string               $name
 * @property-read CarbonInterface      $created_at
 * @property-read CarbonInterface      $updated_at
 * @property-read CarbonInterface|null $deleted_at
 */
final class Language extends AbstractModel
{
    /** @use HasFactory<LanguageFactory> */
    use HasFactory;

    use SoftDeletes;
}
