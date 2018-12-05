<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractController;
use App\Http\Requests\AbstractFormRequest;
use App\Http\Resources\AbstractResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class AbstractApiController
 *
 * @package App\Http\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractApiController extends AbstractController
{
    /**
     * The resource instance.
     *
     * @var AbstractResource
     */
    protected $resource;

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
     * Display a listing of resources.
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
        } catch (\Exception $e) {
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
     * Display the specified resource.
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
        } catch (\Exception $e) {
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
     * Store a newly created resource in storage.
     *
     * @param AbstractFormRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(AbstractFormRequest $request): JsonResponse
    {
        \DB::beginTransaction();

        try {
            $result = $this->model->create($request->toArray());

            \DB::commit();

            return $this->resource->make($result)
                ->response()
                ->header('Content-Language', $this->currentLocale)
                ->header('Location', route($this->baseRouteName . 'show', ['id' => $result->getId()]));
        } catch (\Exception $e) {
            \DB::rollBack();

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
     * Update the specified resource in storage.
     *
     * @param AbstractFormRequest $request
     * @param int                 $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(AbstractFormRequest $request, int $id): JsonResponse
    {
        \DB::beginTransaction();

        try {
            $result = $this->model->findOrFail($id);
            $result->update($request->all());

            \DB::commit();

            return $this->resource->make($result)
                ->response()
                ->header('Content-Language', $this->currentLocale)
                ->header('Location', route($this->baseRouteName . 'show', ['id' => $result->getId()]));
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND, [
                'Content-Language' => $this->currentLocale,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();

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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(int $id): JsonResponse
    {
        \DB::beginTransaction();

        try {
            $result = $this->model->findOrFail($id);
            $result->delete();

            \DB::commit();

            return JsonResponse::create(null, Response::HTTP_NO_CONTENT)
                ->header('Content-Language', $this->currentLocale)
                ->header('Location', route($this->baseRouteName . 'index'));
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return JsonResponse::create([
                'message' => trans('exceptions.http.404_message'),
                'errors' => (object)[
                    $e->getCode() => [$e->getMessage()],
                ],
            ], Response::HTTP_NOT_FOUND, [
                'Content-Language' => $this->currentLocale,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();

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
