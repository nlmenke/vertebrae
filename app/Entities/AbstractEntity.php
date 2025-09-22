<?php

/**
 * Abstract Entity.
 *
 * @package App\Entities
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * The base entity class.
 *
 * This class contains any functions that would otherwise be duplicated in
 * other models. All other entities should extend this class.
 *
 * @since x.x.x introduced
 */
abstract class AbstractEntity extends Model
{
    use HasFactory;

    /**
     * Retrieves the `created_at` attribute.
     *
     * If the table has timestamps, we can pull the creation time of a given
     * model. Otherwise, return a null value.
     *
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->usesTimestamps() ? $this->getAttribute($this->getCreatedAtColumn()) : null;
    }

    /**
     * Retrieves the `deleted_at` attribute.
     *
     * If the table employs soft deletes, we can pull the deletion time of a
     * given mode. Otherwise, return a null value.
     *
     * @return Carbon|null
     */
    public function getDeletedAt(): ?Carbon
    {
        return $this->usesSoftDeletes() ? $this->getAttribute(app(SoftDeletes::class)->getDeletedAtColumn()) : null;
    }

    /**
     * Retrieves the `id` attribute.
     *
     * All models should have an `id` identifier. We can pull that value using
     * this method.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * Retrieves the `updated_at` attribute.
     *
     * If the table has timestamps, we can pull the update time of a given
     * model. Otherwise, return a null value.
     *
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->usesTimestamps() ? $this->getAttribute($this->getUpdatedAtColumn()) : null;
    }

    /**
     * Determines if the model uses soft deletes.
     *
     * Rather than permanently deleting records, we can "soft delete" models
     * by adding a `deleted_at` field. This method will determine if the model
     * utilizes the SoftDeletes trait.
     *
     * @return bool
     */
    protected function usesSoftDeletes(): bool
    {
        return in_array('SoftDeletingTrait', class_uses(self::class), true);
    }
}
