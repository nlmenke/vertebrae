<?php
/**
 * User Role controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\User\UpdateUserRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Response as InertiaResponse;

/**
 * Handles the pages to update user roles.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UserRoleController extends AbstractController
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): InertiaResponse
    {
        $this->authorize('update-roles', $user);

        $roles = Role::query()
            ->oldest('slug')
            ->get();

        $user->load('roles.permissions');

        return inertia('admin/users/EditRoles', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRoleRequest $request, User $user): RedirectResponse
    {
        $roles = $request->collect('roles')
            ->pluck('id');

        $user->roles()->sync($roles);

        return to_route('admin.users.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Roles for ' . $user->refresh()->name . ' were updated successfully.',
            ]);
    }
}
