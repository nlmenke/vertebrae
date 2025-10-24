<?php
/**
 * Locale policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\Locale;
use App\Models\User;

/**
 * Handles authorizing a user to perform locale-related actions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class LocalePolicy extends AbstractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-locales');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-locales');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Locale $locale): bool
    {
        return $user->hasPermission('edit-locales');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Locale $locale): bool
    {
        return $user->hasPermission('delete-locales')
            && $locale->code !== config('app.locale')
            && $locale->code !== config('app.fallback_locale');
    }
}
