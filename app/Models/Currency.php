<?php
/**
 * Currency model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\CurrencyFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Represents a currency in the system.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 *
 * @property-read int                  $id
 * @property-read string               $iso_alpha
 * @property-read string               $iso_numeric
 * @property-read string               $name
 * @property-read string               $symbol
 * @property-read int                  $decimal_precision
 * @property-read float                $exchange_rate
 * @property-read CarbonInterface      $created_at
 * @property-read CarbonInterface      $updated_at
 * @property-read CarbonInterface|null $deleted_at
 */
final class Currency extends AbstractModel
{
    /** @use HasFactory<CurrencyFactory> */
    use HasFactory;

    use SoftDeletes;
}
