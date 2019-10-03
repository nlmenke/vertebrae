<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\AbstractFormRequest;
use App\Http\Resources\AbstractResource;
use DB;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Request;

/**
 * Class AbstractApiController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractApiController extends AbstractController
{
    /**
     * The base route name used by the controller.
     *
     * @var string
     */
    protected $baseRouteName;

    /**
     * The resource instance.
     *
     * @var AbstractResource
     */
    protected $resource;

    /**
     * Create a new API controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseRouteName = str_replace([
            'index',
            'show',
            'store',
            'update',
            'destroy',
        ], '', Request::route()->getName());

        parent::__construct();
    }

    /**
     * Displays a listing of resources.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $result = $this->model;

            if (array_key_exists('index', $this->with)) {
                $result = $result->with($this->with['index']);
            }

            $result = $result->orderBy($this->sorting['column'], $this->sorting['direction'])
                ->paginate($this->perPage);

            return $this->resource->collection($result)
                ->response()
                ->header('Content-Language', $this->currentLocale);
        } catch (Exception $e) {
            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR, [
                'Content-Language' => $this->currentLocale,
            ]);
        }
    }

    /**
     * Displays a specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $result = $this->model;

            if (array_key_exists('show', $this->with)) {
                $result = $result->with($this->with['show']);
            }

            $result = $result->findOrFail($id);

            return $this->resource->make($result)
                ->response()
                ->header('Content-Language', $this->currentLocale);
        } catch (ModelNotFoundException $e) {
            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND, [
                'Content-Language' => $this->currentLocale,
            ]);
        } catch (Exception $e) {
            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR, [
                'Content-Language' => $this->currentLocale,
            ]);
        }
    }

    /**
     * Stores a newly created resource in storage.
     *
     * @param AbstractFormRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(AbstractFormRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $result = $this->model->create($request->toArray());

            DB::commit();

            return $this->resource->make($result)
                ->response()
                ->header('Content-Language', $this->currentLocale)
                ->header('Location', route($this->baseRouteName . 'show', $result->getId()));
        } catch (Exception $e) {
            DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR, [
                'Content-Language' => $this->currentLocale,
            ]);
        }
    }

    /**
     * Updates a specified resource in storage.
     *
     * @param AbstractFormRequest $request
     * @param int                 $id
     * @return JsonResponse
     * @throws Exception
     */
    public function update(AbstractFormRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $result = $this->model->findOrFail($id);
            $result->update($request->toArray());

            DB::commit();

            return $this->resource->make($result)
                ->response()
                ->header('Content-Language', $this->currentLocale)
                ->header('Location', route($this->baseRouteName . 'show', $result->getId()));
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND, [
                'Content-Language' => $this->currentLocale,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR, [
                'Content-Language' => $this->currentLocale,
            ]);
        }
    }

    /**
     * Removes a specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(int $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $result = $this->model->findOrFail($id);
            $result->delete();

            DB::commit();

            return $this->resource
                ->response()
                ->setStatusCode(Response::HTTP_NO_CONTENT)
                ->header('Content-Language', $this->currentLocale)
                ->header('Location', route($this->baseRouteName . 'index'));
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND, [
                'Content-Language' => $this->currentLocale,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.500_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR, [
                'Content-Language' => $this->currentLocale,
            ]);
        }
    }
}
