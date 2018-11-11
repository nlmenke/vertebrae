<?php namespace App\Http\Controllers\Api;

use App\Entities\Currency\Currency;
use App\Http\Requests\Currency\CreateCurrencyRequest;
use App\Http\Requests\Currency\UpdateCurrencyRequest;
use App\Http\Resources\Currency\CurrencyResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return CurrencyResource::collection(Currency::paginate(\Request::get('count') ?? 10))
                ->response();
        } catch (\Exception $e) {
            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified currency.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            return CurrencyResource::make(Currency::findOrFail($id))
                ->response();
        } catch (ModelNotFoundException $e) {
            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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

            return JsonResponse::create(null, Response::HTTP_NO_CONTENT)
                ->header('Location', route('currencies.index'));
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}