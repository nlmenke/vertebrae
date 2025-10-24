<?php
/**
 * Script policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\Script;
use App\Models\User;

/**
 * Handles authorizing a user to perform script-related actions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class ScriptPolicy extends AbstractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-scripts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-scripts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Script $script): bool
    {
        return $user->hasPermission('edit-scripts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Script $script): bool
    {
        return $user->hasPermission('delete-scripts');
    }
}
