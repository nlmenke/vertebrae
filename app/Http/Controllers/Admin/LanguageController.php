<?php
/**
 * Language controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\Language\StoreLanguageRequest;
use App\Http\Requests\Admin\Language\UpdateLanguageRequest;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the application's language admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class LanguageController extends AbstractController
{
    /**
     * Creates a new controller instance.
     */
    public function __construct(Language $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', Language::class);

        $languages = $this->model;

        foreach ($this->sorting['columns'] as $index => $column) {
            $languages = $languages->orderBy($column, $this->sorting['directions'][$index]);
        }

        $languages = $languages->paginate($this->perPage)
            ->withQueryString();

        return Inertia::render('admin/languages/Index', [
            'languages' => $languages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $this->authorize('create', Language::class);

        return Inertia::render('admin/languages/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request): RedirectResponse
    {
        /** @var Language $language */
        $language = $this->model->create($request->validated());

        return to_route('admin.languages.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $language->name . ' was created successfully.',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language): InertiaResponse
    {
        $this->authorize('update', $language);

        return Inertia::render('admin/languages/Edit', [
            'language' => $language,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language): RedirectResponse
    {
        $language->update($request->validated());

        return to_route('admin.languages.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $language->name . ' was updated successfully.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language): RedirectResponse
    {
        $this->authorize('delete', $language);

        $languageName = $language->name;

        $language->delete();

        return to_route('admin.languages.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $languageName . ' was deleted successfully.',
            ]);
    }
}
