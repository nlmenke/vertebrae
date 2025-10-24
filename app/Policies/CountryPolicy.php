<?php
/**
 * Country policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\Country;
use App\Models\User;

/**
 * Handles authorizing a user to perform country-related actions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CountryPolicy extends AbstractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-countries');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-countries');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Country $country): bool
    {
        return $user->hasPermission('edit-countries');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Country $country): bool
    {
        return $user->hasPermission('delete-countries');
    }
}
