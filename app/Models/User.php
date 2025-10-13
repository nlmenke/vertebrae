<?php
/**
 * User model.
 *
 * @author Taylor Otwell <taylor@laravel.com>
 */

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\UserFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Scout\Builder as ScoutBuilder;
use Laravel\Scout\Searchable;

/**
 * Represents a user in the system with authentication and notification
 * capabilities.
 *
 * @since 0.0.0-framework introduced
 *
 * @mixin EloquentBuilder<static>
 * @mixin ScoutBuilder<static>
 *
 * @property-read int                                 $id
 * @property-read string                              $name
 * @property-read string                              $email
 * @property-read CarbonInterface|null                $email_verified_at
 * @property-read string                              $password
 * @property-read string|null                         $remember_token
 * @property-read CarbonInterface                     $created_at
 * @property-read CarbonInterface                     $updated_at
 * @property-read Attribute<array-key, mixed>         $permission_list
 * @property-read EloquentCollection<int, Permission> $permissions
 * @property-read EloquentCollection<int, Role>       $roles
 */
final class User extends AbstractModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract, MustVerifyEmailContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use MustVerifyEmail;
    use Notifiable;
    use Searchable;
    use TwoFactorAuthenticatable;

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'permission_list',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var list<string>
     */
    protected $with = [
        'permissions',
        'roles.permissions',
    ];

    /**
     * A collection of all permissions related to a user and through its roles.
     *
     * @return EloquentCollection<int, Permission>
     */
    public function allPermissions(): EloquentCollection
    {
        $permissions = $this->permissions;

        $this->roles->each(function (Role $role) use ($permissions): void {
            if ($role->slug === 'admin') {
                $role->setAttribute('permissions', Permission::all());
            }

            $role->permissions->each(function (Permission $rolePermission) use ($permissions): void {
                if ($permissions->doesntContain('slug', $rolePermission->slug)) {
                    $permissions->push($rolePermission);
                }
            });
        });

        return $permissions->sortBy('slug');
    }

    /**
     * Determine if the user has the specified permission.
     */
    public function hasPermission(Permission|string $permission): bool
    {
        if ($permission instanceof Permission) {
            $permission = $permission->slug;
        }

        return $this->allPermissions()
            ->contains('slug', $permission);
    }

    /**
     * The `permissions` relationship instance.
     *
     * @return BelongsToMany<Permission, $this>
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * The `roles` relationship instance.
     *
     * @return BelongsToMany<Role, $this>
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, float|int|string|null>
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * A list of permission slugs attached to the user for the front-end.
     *
     * @return Attribute<array-key, mixed>
     */
    protected function permissionList(): Attribute
    {
        return new Attribute(
            fn () => $this->allPermissions()
                ->pluck('slug')
                ->toArray()
        );
    }
}
