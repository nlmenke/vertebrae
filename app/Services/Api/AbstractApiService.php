<?php
/**
 * Abstract API Service.
 *
 * @package App\Services\Api
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Services\Api;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * The base API service class.
 *
 * This class contains any functionality that would otherwise be duplicated in
 * other API services. All other API services should extend this class.
 *
 * @since x.x.x introduced
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
     * This method is used to send a DELETE request to an external application.
     * A DELETE request will typically returns a 200 (OK) HTTP response code
     * along with a response body, a 204 (No Content) with no response body, or
     * a 404 (Not Found) if the record or route does not exist.
     *
     * @param string       $uri
     * @param int|null     $id
     * @param Closure|null $callback
     *
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
     * This method is used to send a GET request to an external application. A
     * GET request may return a 200 (OK) HTTP response code, which may or may
     * not include a response body, depending on the application, or a 404 (Not
     * Found) if the collection, record, or route does not exist.
     *
     * @param string       $uri
     * @param int|null     $id
     * @param array        $query
     * @param Closure|null $callback
     *
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
     * This method is used to send a POST request to an external application.
     * POST requests typically return a 201 (Created) along with a location
     * header with a link to the newly-created resource, a 404 (Not Found) if
     * the route does not exist, or a 409 (Conflict) if the resource already
     * exists.
     *
     * @param string       $uri
     * @param array        $formParams
     * @param Closure|null $callback
     *
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
     * This method is used to send a PUT request to an external application.
     * PUT requests can return a 200 (OK) along with a body or a 204 (No
     * Content) if no body is included in the response, either of which may
     * include a location header with a link to the resource. You may also
     * receive a 404 (Not Found) if the record or route does not exist.
     *
     * @param string       $uri
     * @param int|null     $id
     * @param array        $formParams
     * @param Closure|null $callback
     *
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
     *
     * @return self
     */
    protected function headers(array $headerList): self
    {
        $this->headerList = array_merge($this->headerList, $headerList);

        return $this;
    }
}
