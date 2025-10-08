<?php
/**
 * Abstract model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * Base model that all other models extend.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 */
abstract class AbstractModel extends Model {}
