<?php namespace Tests\Feature\Controllers\Api;

use App\Entities\AbstractEntity;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * Class AbstractApiControllerTest
 *
 * @package Tests\Feature\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractApiControllerTest extends TestCase
{
    /**
     * The entity used by the tests.
     *
     * @var AbstractEntity
     */
    protected $model;

    /**
     * The base route name used by the tests.
     *
     * @var string
     */
    protected $baseRouteName;

    /**
     * Required fields to be cleared for testing validation.
     *
     * @var array
     */
    protected $validationRequirements = [];

    /**
     * Create a new test instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        if (!$this->baseRouteName) {
            $this->baseRouteName = $this->getBaseRouteNameFromModel();
        }
    }

    /**
     * Use the model factory to generate a fake resource.
     *
     * @param int $count
     * @return mixed
     */
    protected function createResources(int $count = 1)
    {
        if ($count > 1) {
            return factory($this->model, $count)->create();
        }

        return factory($this->model)->create();
    }

    /**
     * Use the model factory to generate a fake request.
     *
     * @param bool $failValidation
     * @return array
     */
    protected function createRequest($failValidation = false): array
    {
        $validation = [];
        if ($failValidation && !empty($this->validationRequirements)) {
            foreach ($this->validationRequirements as $field) {
                $validation[$field] = '';
            }
        }

        $request = factory($this->model)->make($validation);

        return $request->toArray();
    }

    /**
     * Get the baseRouteName from the entity.
     *
     * @return string
     */
    protected function getBaseRouteNameFromModel(): string
    {
        $modelArray = explode('\\', $this->model);

        return str_plural(strtolower(end($modelArray)));
    }

    /**
     * Build the error array for required field validation failures.
     *
     * @return array
     */
    protected function getValidationRequirementErrors()
    {
        $validation = [];
        if (!empty($this->validationRequirements)) {
            foreach ($this->validationRequirements as $field) {
                $validation[$field] = ['The ' . str_replace('_', ' ', $field) . ' field is required.'];
            }
        }

        return $validation;
    }

    /**
     * Listing of the resources can be displayed via API.
     *
     * @return void
     * @test
     */
    public function canDisplayResourceList(): void
    {
        $route = $this->baseRouteName . '.index';

        if (\Route::has($route)) {
            $resources = $this->createResources(10);

            $response = $this->get(route($route));
            $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'data' => $resources->toArray(),
                ]);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }

    /**
     * Specified resource can be displayed via API.
     *
     * @return void
     * @test
     */
    public function canDisplaySpecifiedResource(): void
    {
        $route = $this->baseRouteName . '.show';

        if (\Route::has($route)) {
            $resource = $this->createResources();

            $response = $this->get(route($route, $resource->getId()));
            $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'data' => $resource->toArray(),
                ]);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }

    /**
     * Resource can be created through API.
     *
     * @return void
     * @test
     */
    public function canStoreResource(): void
    {
        $route = $this->baseRouteName . '.store';

        if (\Route::has($route)) {
            $request = $this->createRequest();

            $response = $this->postJson(route($route), $request);
            $response->assertJsonMissingValidationErrors($this->validationRequirements)
                ->assertStatus(Response::HTTP_CREATED)
                ->assertJson([
                    'data' => $request,
                ]);

            // verify newly created resource exists
            $response = $this->get($response->headers->get('Location'));
            $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'data' => $request,
                ]);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }

    /**
     * API store request validation failure.
     *
     * @return void
     * @test
     */
    public function canFailStoreValidation(): void
    {
        $route = $this->baseRouteName . '.store';

        if (\Route::has($route)) {
            $request = $this->createRequest(true);

            $response = $this->postJson(route($route), $request);
            $response->assertJsonValidationErrors($this->validationRequirements)
                ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
                ->assertJson([
                    'errors' => $this->getValidationRequirementErrors(),
                ]);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }

    /**
     * Specified resource can be updated through API.
     *
     * @return void
     * @test
     */
    public function canUpdateResource(): void
    {
        $route = $this->baseRouteName . '.update';

        if (\Route::has($route)) {
            $resource = $this->createResources();
            $request = $this->createRequest();

            $response = $this->putJson(route($route, $resource->getId()), $request);
            $response->assertJsonMissingValidationErrors($this->validationRequirements)
                ->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'data' => $request,
                ]);

            // verify resource was updated
            $response = $this->get($response->headers->get('Location'));
            $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'data' => $request,
                ]);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }

    /**
     * API update request validation failure.
     *
     * @return void
     * @test
     */
    public function canFailUpdateValidation(): void
    {
        $route = $this->baseRouteName . '.update';

        if (\Route::has($route)) {
            $resource = $this->createResources();
            $request = $this->createRequest(true);

            $response = $this->putJson(route($route, $resource->getId()), $request);
            $response->assertJsonValidationErrors($this->validationRequirements)
                ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
                ->assertJson([
                    'errors' => $this->getValidationRequirementErrors(),
                ]);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }

    /**
     * Specified resource can be removed through API.
     *
     * @return void
     * @test
     */
    public function canDestroyResource(): void
    {
        $route = $this->baseRouteName . '.destroy';

        if (\Route::has($route)) {
            $resource = $this->createResources();

            $response = $this->deleteJson(route('currencies.destroy', $resource->getId()));
            $response->assertStatus(Response::HTTP_NO_CONTENT);

            // verify resource was deleted
            $response = $this->get(route('currencies.show', $resource->getId()));
            $response->assertStatus(Response::HTTP_NOT_FOUND);
        } else {
            $this->markTestSkipped($route . ' route is not implemented.');
        }
    }
}
