<?php namespace Tests\Feature;

use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest(): void
    {
        $response = $this->get('api/currencies');

        $response->assertStatus(200);
    }
}
