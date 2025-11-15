<?php
/**
 * Locale controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\Locale\StoreLocaleRequest;
use App\Http\Requests\Admin\Locale\UpdateLocaleRequest;
use App\Models\Country;
use App\Models\Language;
use App\Models\Locale;
use App\Models\Script;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the application's locale admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class LocaleController extends AbstractController
{
    /**
     * Creates a new controller instance.
     */
    public function __construct(Locale $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', Locale::class);

        $locales = $this->model->with(['country', 'language', 'script']);

        foreach ($this->sorting['columns'] as $index => $column) {
            $locales = $locales->orderBy($column, $this->sorting['directions'][$index]);
        }

        $locales = $locales->paginate($this->perPage)
            ->withQueryString();

        return Inertia::render('admin/locales/Index', [
            'locales' => $locales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $this->authorize('create', Locale::class);

        $countries = Country::query()
            ->oldest('name')
            ->get();

        $languages = Language::query()
            ->oldest('name')
            ->get();

        $scripts = Script::query()
            ->oldest('name')
            ->get();

        return Inertia::render('admin/locales/Create', [
            'countries' => $countries,
            'languages' => $languages,
            'scripts' => $scripts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocaleRequest $request): RedirectResponse
    {
        /** @var Locale $locale */
        $locale = $this->model->create($request->validated());

        return to_route('admin.locales.index')
            ->with('toast', [
                'style' => 'success',
                'message' => trans('common.created_successfully', [
                    'value' => $locale->native,
                ]),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locale $locale): InertiaResponse
    {
        $this->authorize('update', $locale);

        $countries = Country::query()
            ->oldest('name')
            ->get();

        $languages = Language::query()
            ->oldest('name')
            ->get();

        $scripts = Script::query()
            ->oldest('name')
            ->get();

        return Inertia::render('admin/locales/Edit', [
            'locale' => $locale,
            'countries' => $countries,
            'languages' => $languages,
            'scripts' => $scripts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocaleRequest $request, Locale $locale): RedirectResponse
    {
        $locale->update($request->validated());

        return to_route('admin.locales.index')
            ->with('toast', [
                'style' => 'success',
                'message' => trans('common.updated_successfully', [
                    'value' => $locale->refresh()->native,
                ]),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locale $locale): RedirectResponse
    {
        $this->authorize('delete', $locale);

        $localeNative = $locale->native;

        $locale->delete();

        return to_route('admin.locales.index')
            ->with('toast', [
                'style' => 'success',
                'message' => trans('common.deleted_successfully', [
                    'value' => $localeNative,
                ]),
            ]);
    }
}
