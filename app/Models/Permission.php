<?php
/**
 * Permission model.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Represents a permission (role and/or user) in the system.
 *
 * @since 0.0.0-vertebrae introduced
 *
 * @mixin EloquentBuilder<static>
 *
 * @property-read int                           $id
 * @property-read string                        $slug
 * @property-read string                        $name
 * @property-read string|null                   $description
 * @property-read CarbonInterface               $created_at
 * @property-read CarbonInterface               $updated_at
 * @property-read EloquentCollection<int, Role> $roles
 * @property-read EloquentCollection<int, User> $users
 */
final class Permission extends AbstractModel
{
    /** @use HasFactory<PermissionFactory> */
    use HasFactory;

    /**
     * The `roles` relationship instance.
     *
     * @return BelongsToMany<Role, $this>
     *
     * @todo: testing
     *
     * @codeCoverageIgnore this relationship is unused
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * The `users` relationship instance.
     *
     * @return BelongsToMany<User, $this>
     *
     * @todo: testing
     *
     * @codeCoverageIgnore this relationship is unused
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
