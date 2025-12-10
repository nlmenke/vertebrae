<?php
/**
 * Country controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\Country\StoreCountryRequest;
use App\Http\Requests\Admin\Country\UpdateCountryRequest;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the application's country admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CountryController extends AbstractController
{
    /**
     * Creates a new controller instance.
     */
    public function __construct(Country $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', Country::class);

        $countries = $this->model->with('currency');

        foreach ($this->sorting['columns'] as $index => $column) {
            $countries = $countries->orderBy($column, $this->sorting['directions'][$index]);
        }

        $countries = $countries->paginate($this->perPage)
            ->withQueryString();

        return Inertia::render('admin/countries/Index', [
            'countries' => $countries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $this->authorize('create', Country::class);

        $currencies = Currency::query()
            ->oldest('name')
            ->get();

        return Inertia::render('admin/countries/Create', [
            'currencies' => $currencies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request): RedirectResponse
    {
        /** @var Country $country */
        $country = $this->model->create($request->validated());

        return to_route('admin.countries.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $country->name . ' was created successfully.',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country): InertiaResponse
    {
        $this->authorize('update', $country);

        $currencies = Currency::query()
            ->oldest('name')
            ->get();

        return Inertia::render('admin/countries/Edit', [
            'country' => $country,
            'currencies' => $currencies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());

        return to_route('admin.countries.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $country->name . ' was updated successfully.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $this->authorize('delete', $country);

        $countryName = $country->name;

        $country->delete();

        return to_route('admin.countries.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $countryName . ' was deleted successfully.',
            ]);
    }
}
