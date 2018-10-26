<?php namespace App\Http\Controllers\Api;

use App\Entities\Currency\Currency;
use App\Http\Requests\Currency\CreateCurrencyRequest;
use App\Http\Requests\Currency\UpdateCurrencyRequest;
use App\Http\Resources\Currency\CurrencyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class CurrencyController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CurrencyController extends AbstractApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of currencies.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CurrencyResource::collection(Currency::paginate(\Request::get('count') ?? 10));
    }

    /**
     * Store a newly created currency in storage.
     *
     * @param CreateCurrencyRequest $request
     * @return mixed
     */
    public function store(CreateCurrencyRequest $request)
    {
        //
    }

    /**
     * Display the specified currency.
     *
     * @param int $id
     * @return CurrencyResource
     */
    public function show(int $id): CurrencyResource
    {
        return new CurrencyResource(Currency::find($id));
    }

    /**
     * Update the specified currency in storage.
     *
     * @param UpdateCurrencyRequest $request
     * @param int                   $id
     * @return mixed
     */
    public function update(UpdateCurrencyRequest $request, int $id)
    {
        //
    }

    /**
     * Remove the specified currency from storage.
     *
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        //
    }
}
