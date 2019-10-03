<?php declare(strict_types=1);

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AbstractEntity
 *
 * @package App\Entities
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractEntity extends Model
{
    /**
     * Get the created_at attribute.
     *
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->usesTimestamps() ? $this->getAttribute($this->getCreatedAtColumn()) : null;
    }

    /**
     * Get the deleted_at attribute.
     *
     * @return Carbon|null
     */
    public function getDeletedAt(): ?Carbon
    {
        return $this->usesSoftDeletes() ? $this->getAttribute(app(SoftDeletes::class)->getDeletedAtColumn()) : null;
    }

    /**
     * Get the id attribute.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * Get the updated_at attribute.
     *
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->usesTimestamps() ? $this->getAttribute($this->getUpdatedAtColumn()) : null;
    }

    /**
     * Determine if the model uses soft deletes.
     *
     * @return bool
     */
    protected function usesSoftDeletes(): bool
    {
        return in_array('SoftDeletingTrait', class_uses(self::class));
    }
}
