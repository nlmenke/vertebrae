<?php
/**
 * User policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;

/**
 * Handles authorizing a user to perform user-related actions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UserPolicy extends AbstractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-users');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $userUpdating): bool
    {
        if ($user->hasPermission('edit-users')) {
            return true;
        }

        return $userUpdating->id === $user->id;
    }

    /**
     * Determine whether the user can update the user's permissions.
     */
    public function updatePermissions(User $user, User $userUpdating): bool
    {
        return $user->hasPermission('edit-user-permissions');
    }

    /**
     * Determine whether the user can update the user's roles.
     */
    public function updateRoles(User $user, User $userUpdating): bool
    {
        return $user->hasPermission('edit-user-roles');
    }
}
