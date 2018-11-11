<?php namespace Tests\Feature;

use App\Entities\Currency\Currency;
use Illuminate\Http\Response;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * List can be viewed via API.
     *
     * @test
     * @return void
     */
    public function canViewCurrencies(): void
    {
        $currencies = factory(Currency::class, 10)->create();

        $response = $this->get(route('currencies.index'));
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => $currencies->toArray()
            ]);
    }

    /**
     * Show can be viewed via API.
     *
     * @test
     * @return void
     */
    public function canViewCurrency(): void
    {
        $currency = factory(Currency::class)->create();

        $response = $this->get(route('currencies.show', $currency->getId()));
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => $currency->toArray()
            ]);
    }

    /**
     * Currency can be created via API.
     *
     * @test
     * @return void
     */
    public function canCreateCurrency(): void
    {
        $data = factory(Currency::class)->make()->toArray();

        $response = $this->postJson(route('currencies.store'), $data);
        $response->assertJsonMissingValidationErrors([
                'iso_alpha',
                'iso_numeric',
                'name',
                'symbol',
                'decimal_precision',
                'exchange_rate',
            ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                'data' => $data
            ]);

        // verify newly created currency exists
        $response = $this->get($response->headers->get('Location'));
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => $data
            ]);
    }

    /**
     * Validate input for create API.
     *
     * @test
     * @return void
     */
    public function creatingCurrencyRequiresName(): void
    {
        $data = factory(Currency::class)->make(['name' => ''])->toArray();

        $response = $this->postJson(route('currencies.store'), $data);
        $response->assertJsonValidationErrors([
                'name',
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'errors' => [
                    'name' => ['The name field is required.']
                ]
            ]);
    }

    /**
     * Currency can be updated via API.
     *
     * @test
     * @return void
     */
    public function canUpdateCurrency(): void
    {
        $currency = factory(Currency::class)->create();
        $data = factory(Currency::class)->make()->toArray();

        $response = $this->putJson(route('currencies.update', $currency->getId()), $data);
        $response->assertJsonMissingValidationErrors([
                'iso_alpha',
                'iso_numeric',
                'name',
                'symbol',
                'decimal_precision',
                'exchange_rate',
            ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => $data
            ]);

        // verify currency was updated
        $response = $this->get($response->headers->get('Location'));
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'data' => $data
            ]);
    }

    /**
     * Validate input for update API.
     *
     * @test
     * @return void
     */
    public function updatingCurrencyRequiresName(): void
    {
        $currency = factory(Currency::class)->create();
        $data = factory(Currency::class)->make(['name' => ''])->toArray();

        $response = $this->putJson(route('currencies.update', $currency->getId()), $data);
        $response->assertJsonValidationErrors([
                'name',
            ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'errors' => [
                    'name' => ['The name field is required.']
                ]
            ]);
    }

    /**
     * Currency can be deleted via API.
     *
     * @test
     * @return void
     */
    public function canDeleteCurrency(): void
    {
        $currency = factory(Currency::class)->create();

        $response = $this->deleteJson(route('currencies.destroy', $currency->getId()));
        $response->assertStatus(Response::HTTP_NO_CONTENT);

        // verify currency was deleted
        $response = $this->get(route('currencies.show', $currency->getId()));
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
