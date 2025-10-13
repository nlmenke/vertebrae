<?php
/**
 * User controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response as InertiaResponse;
use Laravel\Scout\Builder as ScoutBuilder;

/**
 * Handles the application's user admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class UserController extends AbstractController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(User $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', User::class);

        $users = $this->model;

        if ($this->request->has('search')) {
            // todo: testing
            /** @var ScoutBuilder<User>|User $users */
            // @phpstan-ignore method.notFound
            $users = $users->search($this->request->query('search')); // @codeCoverageIgnore
        } else {
            foreach ($this->sorting['columns'] as $index => $column) {
                $users = $users->orderBy($column, $this->sorting['directions'][$index]);
            }
        }

        $users = $users->paginate($this->perPage)
            ->withQueryString();

        return inertia('admin/users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): InertiaResponse
    {
        $this->authorize('update', $user);

        return inertia('admin/users/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->safe(['name']));

        return to_route('admin.users.index')
            ->with('toast', [
                'type' => 'success',
                'message' => $user->refresh()->name . ' was updated successfully.',
            ]);
    }
}
