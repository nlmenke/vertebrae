<?php namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
}
