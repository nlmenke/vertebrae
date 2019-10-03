<?php declare(strict_types=1);

namespace App\Services\Api;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class AbstractApiService
 *
 * @package App\Services\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
abstract class AbstractApiService
{
    /**
     * The base URI for the API call.
     *
     * @var string
     */
    protected $baseUri;

    /**
     * The client instance.
     *
     * @var Client
     */
    protected $client;

    /**
     * Headers being sent with the API call.
     *
     * @var array
     */
    protected $headerList = [
        'Accept' => 'application/json',
    ];

    /**
     * Create a new API service class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
        ]);
    }

    /**
     * Submits a DELETE API request.
     *
     * @param string       $uri
     * @param int|null     $id
     * @param Closure|null $callback
     * @return array
     */
    public function delete(string $uri, int $id = null, Closure $callback = null): array
    {
        try {
            $result = $this->client->delete($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
            ]);

            $contents = $result->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($result);
            }
        } catch (ClientException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
        }

        return json_decode($contents, true);
    }

    /**
     * Submits a GET API request.
     *
     * @param string       $uri
     * @param int|null     $id
     * @param array        $query
     * @param Closure|null $callback
     * @return array
     */
    public function get(string $uri, int $id = null, array $query = [], Closure $callback = null): array
    {
        try {
            $result = $this->client->get($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
                'query' => $query,
            ]);

            $contents = $result->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($result);
            }
        } catch (ClientException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
        }

        return json_decode($contents, true);
    }

    /**
     * Submits a POST API request.
     *
     * @param string       $uri
     * @param array        $formParams
     * @param Closure|null $callback
     * @return array
     */
    public function post(string $uri, array $formParams = [], Closure $callback = null): array
    {
        try {
            $result = $this->client->post($uri, [
                'headers' => $this->headerList,
                'form_params' => $formParams,
            ]);

            $contents = $result->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($result);
            }
        } catch (ClientException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
        }

        return json_decode($contents, true);
    }

    /**
     * Submits a PUT API request.
     *
     * @param string       $uri
     * @param int|null     $id
     * @param array        $formParams
     * @param Closure|null $callback
     * @return array
     */
    public function put(string $uri, int $id = null, array $formParams = [], Closure $callback = null): array
    {
        try {
            $result = $this->client->put($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
                'form_params' => $formParams,
            ]);

            $contents = $result->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($result);
            }
        } catch (ClientException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
        }

        return json_decode($contents, true);
    }

    /**
     * Adds additional headers to the headerList array.
     *
     * @param array $headerList
     * @return self
     */
    protected function headers(array $headerList): self
    {
        $this->headerList = array_merge($this->headerList, $headerList);

        return $this;
    }
}
