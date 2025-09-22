<?php

/**
 * Abstract API Controller.
 *
 * @package App\Http\Controllers\Api
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

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
 * The base API controller class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other API controllers. All other API controllers should extend this class.
 *
 * @since x.x.x introduced
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
     * Removes a specified resource from storage.
     *
     * This method is used to delete an existing record. Successful requests
     * will result in a 204 (No Content) HTTP response code with no body, but
     * a `Location` header with a link to the index path will be provided. A
     * 404 (Not Found) may be returned if the record does not currently exist.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
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

    /**
     * Displays a listing of resources.
     *
     * This method is used to retrieve a full list of resources. Upon success:
     * by default, a JSON object with ten (10) records will be returned with an
     * HTTP response code of 200 (OK). You will also receive a listing with the
     * total number of records as well as a listing with links to the first,
     * last, previous (if applicable) and next (if applicable) pages.
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
     * This method is used to retrieve a single record. Upon success: the
     * resource will be returned as a JSON object with an HTTP response code of
     * 200 (OK). If the record does not exist, you will get a 404 (Not Found)
     * HTTP response code along with any error codes thrown by the application
     * in attempt to assist with any debugging that may be necessary.
     *
     * @param int $id
     *
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
     * This method is used to create a new record. A successful request will
     * return a 201 (Created) HTTP response and the newly created entry. The
     * response will include a `Location` header with the path to the new
     * resource as well. If any validation errors exist, an HTTP response code
     * of 422 (Unprocessable Entity) will be returned along with any fields
     * that do not match the rules set by the form request.
     *
     * @param AbstractFormRequest $request
     *
     * @throws Exception
     *
     * @return JsonResponse
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
     * This method is used to modify an existing record. Upon success: an HTTP
     * response of 200 (OK) will be returned with the modified entry. Invalid
     * requests will result in a 422 (Unprocessable Entity) response and any
     * fields causing the validation failure.
     *
     * @param AbstractFormRequest $request
     * @param int                 $id
     *
     * @throws Exception
     *
     * @return JsonResponse
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
}
