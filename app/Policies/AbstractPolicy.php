<?php
/**
 * Abstract policy.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;

/**
 * Base policy that all other policies extend.
 *
 * @since 0.0.0-vertebrae introduced
 */
abstract class AbstractPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    final public function before(User $user): ?bool
    {
        if ($user->roles()->where('name', 'admin')->exists()) {
            return true;
        }

        return null;
    }
}
