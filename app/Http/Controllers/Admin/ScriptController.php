<?php
/**
 * Script controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\Script\StoreScriptRequest;
use App\Http\Requests\Admin\Script\UpdateScriptRequest;
use App\Models\Script;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the application's script admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class ScriptController extends AbstractController
{
    /**
     * Creates a new controller instance.
     */
    public function __construct(Script $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', Script::class);

        $scripts = $this->model;

        foreach ($this->sorting['columns'] as $index => $column) {
            $scripts = $scripts->orderBy($column, $this->sorting['directions'][$index]);
        }

        $scripts = $scripts->paginate($this->perPage)
            ->withQueryString();

        return Inertia::render('admin/scripts/Index', [
            'scripts' => $scripts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $this->authorize('create', Script::class);

        return Inertia::render('admin/scripts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScriptRequest $request): RedirectResponse
    {
        /** @var Script $script */
        $script = $this->model->create($request->validated());

        return to_route('admin.scripts.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $script->name . ' was created successfully.',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Script $script): InertiaResponse
    {
        $this->authorize('update', $script);

        return Inertia::render('admin/scripts/Edit', [
            'script' => $script,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScriptRequest $request, Script $script): RedirectResponse
    {
        $script->update($request->validated());

        return to_route('admin.scripts.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $script->name . ' was updated successfully.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Script $script): RedirectResponse
    {
        $this->authorize('delete', $script);

        $scriptName = $script->name;

        $script->delete();

        return to_route('admin.scripts.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $scriptName . ' was deleted successfully.',
            ]);
    }
}
