<?php
/**
 * Role controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the application's role admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class RoleController extends AbstractController
{
    /**
     * Creates a new controller instance.
     */
    public function __construct(Role $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', Role::class);

        $roles = $this->model;

        foreach ($this->sorting['columns'] as $index => $column) {
            $roles = $roles->orderBy($column, $this->sorting['directions'][$index]);
        }

        $roles = $roles->paginate($this->perPage)
            ->withQueryString();

        return Inertia::render('admin/roles/Index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $this->authorize('create', Role::class);

        $sqlPositionCheck = config('database.default') === 'sqlite' ? "instr(slug, '-')" : "position('-' in slug)";

        $permissions = Permission::query()
            ->orderByRaw(sprintf('substr(slug, %s + 1)', $sqlPositionCheck))
            ->orderByRaw(
                "CASE substr(slug, 1, {$sqlPositionCheck} - 1)
                    WHEN 'view' THEN 1
                    WHEN 'create' THEN 2
                    WHEN 'edit' THEN 3
                    WHEN 'delete' THEN 4
                    ELSE 5
                END"
            )
            ->get();

        return Inertia::render('admin/roles/Create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        /** @var array<model-property<Role>, mixed> $attributes */
        $attributes = $request->safe()->except('permissions');
        /** @var Role $role */
        $role = $this->model->create($attributes);

        $permissions = $request->collect('permissions')
            ->pluck('id');

        $role->permissions()->sync($permissions);

        return to_route('admin.roles.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $role->refresh()->name . ' was created successfully.',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): InertiaResponse
    {
        $this->authorize('update', $role);

        $sqlPositionCheck = config('database.default') === 'sqlite' ? "instr(slug, '-')" : "position('-' in slug)";

        $permissions = Permission::query()
            ->orderByRaw(sprintf('substr(slug, %s + 1)', $sqlPositionCheck))
            ->orderByRaw(
                "CASE substr(slug, 1, {$sqlPositionCheck} - 1)
                    WHEN 'view' THEN 1
                    WHEN 'create' THEN 2
                    WHEN 'edit' THEN 3
                    WHEN 'delete' THEN 4
                    ELSE 5
                END"
            )
            ->get();

        if ($role->slug === 'admin') {
            $role->setRelation('permissions', $permissions);
        } else {
            $role->load('permissions');
        }

        return Inertia::render('admin/roles/Edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        /** @var array<model-property<Role>, mixed> $attributes */
        $attributes = $request->safe()->except('permissions');
        $role->update($attributes);

        $permissions = $request->collect('permissions')
            ->pluck('id');

        $role->permissions()->sync($permissions);

        return to_route('admin.roles.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $role->refresh()->name . ' was updated successfully.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $this->authorize('delete', $role);

        $roleName = $role->name;

        $role->delete();

        return to_route('admin.roles.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $roleName . ' was deleted successfully.',
            ]);
    }
}
