<?php namespace App\Http\Controllers\Api;

use App\Entities\Currency\Currency;
use App\Http\Requests\Currency\CreateCurrencyRequest;
use App\Http\Requests\Currency\UpdateCurrencyRequest;
use App\Http\Resources\Currency\CurrencyResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

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
     * Display the specified currency.
     *
     * @param int $id
     * @return CurrencyResource|JsonResponse
     */
    public function show(int $id)
    {
        try {
            return CurrencyResource::make(Currency::findOrFail($id));
        } catch (\Exception $e) {
            return JsonResponse::create([
                'message' => 'No records found for the given ID.',
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created currency in storage.
     *
     * @param CreateCurrencyRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(CreateCurrencyRequest $request): JsonResponse
    {
        \DB::beginTransaction();

        try {
            $currency = Currency::create($request->toArray());

            \DB::commit();

            return CurrencyResource::make($currency)
                ->response()
                ->header('Location', route('currencies.show', ['id' => $currency->getId()]));
        } catch (\Exception $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => 'Oops, something went wrong.',
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified currency in storage.
     *
     * @param UpdateCurrencyRequest $request
     * @param int                   $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(UpdateCurrencyRequest $request, int $id): JsonResponse
    {
        \DB::beginTransaction();

        try {
            $currency = Currency::findOrFail($id);
            $currency->update($request->all());

            \DB::commit();

            return CurrencyResource::make($currency)
                ->response()
                ->header('Location', route('currencies.show', ['id' => $currency->getId()]));
        } catch (\Exception $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => 'Oops, something went wrong.',
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified currency from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(int $id): JsonResponse
    {
        \DB::beginTransaction();

        try {
            $currency = Currency::findOrFail($id);
            $currency->delete();

            \DB::commit();

            return JsonResponse::create(null, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => 'Oops, something went wrong.',
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
