<?php
/**
 * User Permission controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\User\UpdateUserPermissionRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the admin pages to update role/user permissions.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UserPermissionController extends AbstractController
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): InertiaResponse
    {
        $this->authorize('update-permissions', $user);

        if (config('database.default') === 'sqlite') {
            $SqlPositionCheck = "instr(slug, '-')";
        } else {
            $SqlPositionCheck = "position('-' in slug)";
        }

        $permissions = Permission::query()
            ->orderByRaw("substr(slug, $SqlPositionCheck + 1)")
            ->orderByRaw(
                "CASE substr(slug, 1, $SqlPositionCheck - 1)
                    WHEN 'view' THEN 1
                    WHEN 'create' THEN 2
                    WHEN 'edit' THEN 3
                    WHEN 'delete' THEN 4
                    ELSE 5
                END"
            )
            ->get();

        $user->load([
            'permissions',
            'roles.permissions',
        ]);

        return Inertia::render('admin/users/EditPermissions', [
            'permissions' => $permissions,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPermissionRequest $request, User $user): RedirectResponse
    {
        $permissions = $request->collect('permissions')
            ->pluck('id');

        $user->permissions()->sync($permissions);

        return to_route('admin.users.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Permissions for ' . $user->refresh()->name . ' were updated successfully.',
            ]);
    }
}
