<?php
/**
 * Currency controller.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\Admin\Currency\StoreCurrencyRequest;
use App\Http\Requests\Admin\Currency\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Handles the application's currency admin pages.
 *
 * @since 0.0.0-vertebrae introduced
 */
final class CurrencyController extends AbstractController
{
    /**
     * Creates a new controller instance.
     */
    public function __construct(Currency $model, public Request $request)
    {
        $this->model = $model;

        parent::__construct($request);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $this->authorize('viewAny', Currency::class);

        $currencies = $this->model;

        foreach ($this->sorting['columns'] as $index => $column) {
            $currencies = $currencies->orderBy($column, $this->sorting['directions'][$index]);
        }

        $currencies = $currencies->paginate($this->perPage)
            ->withQueryString();

        return Inertia::render('admin/currencies/Index', [
            'currencies' => $currencies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $this->authorize('create', Currency::class);

        return Inertia::render('admin/currencies/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurrencyRequest $request): RedirectResponse
    {
        /** @var Currency $currency */
        $currency = $this->model->create($request->validated());

        return to_route('admin.currencies.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $currency->name . ' was created successfully.',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency): InertiaResponse
    {
        $this->authorize('update', $currency);

        return Inertia::render('admin/currencies/Edit', [
            'currency' => $currency,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency): RedirectResponse
    {
        $currency->update($request->validated());

        return to_route('admin.currencies.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $currency->name . ' was updated successfully.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency): RedirectResponse
    {
        $this->authorize('delete', $currency);

        $currencyName = $currency->name;

        $currency->delete();

        return to_route('admin.currencies.index')
            ->with('toast', [
                'style' => 'success',
                'message' => $currencyName . ' was deleted successfully.',
            ]);
    }
}
