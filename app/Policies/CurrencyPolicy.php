<?php
/**
 * Currency policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\Currency;
use App\Models\User;

/**
 * Handles authorizing a user to perform currency-related actions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CurrencyPolicy extends AbstractPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-currencies');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-currencies');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Currency $currency): bool
    {
        return $user->hasPermission('edit-currencies');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Currency $currency): bool
    {
        return $user->hasPermission('delete-currencies');
    }
}
