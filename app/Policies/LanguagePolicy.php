<?php
/**
 * Language policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\Language;
use App\Models\User;

/**
 * Handles authorizing a user to perform language-related actions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class LanguagePolicy extends AbstractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-languages');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-languages');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Language $language): bool
    {
        return $user->hasPermission('edit-languages');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Language $language): bool
    {
        return $user->hasPermission('delete-languages');
    }
}
