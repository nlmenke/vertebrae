<?php
/**
 * Abstract API service.
 *
 * @author Nick Menke <git@nlmenke.net>
 */

declare(strict_types=1);

namespace App\Services\Api;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Base API service that all other API services extend.
 *
 * @since 0.0.0-vertebrae introduced
 */
abstract class AbstractApiService
{
    /**
     * The base URI for the API call.
     */
    protected string $baseUri;

    /**
     * The Guzzle HTTP client instance.
     */
    protected ?Client $client = null;

    /**
     * Headers being sent with the API call.
     *
     * @var array<string, mixed>
     */
    protected array $headerList = [
        'Accept' => 'application/json',
    ];

    /**
     * Creates a new API service instance.
     */
    public function __construct(?Client $client = null)
    {
        $this->client = $client ?? new Client([
            'base_uri' => $this->baseUri,
        ]);
    }

    /**
     * Submits a GET request to an external API.
     *
     * @param array<string, mixed> $query
     *
     * @return array<mixed, mixed>
     */
    final public function get(
        string $uri,
        ?int $id = null,
        array $query = [],
        ?Closure $callback = null,
    ): array {
        try {
            $result = $this->client?->get($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
                'query' => $query,
            ]);

            $contents = (string) $result?->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($contents);
            }
        } catch (ClientException|GuzzleException $exception) {
            $contents = (string) json_encode([
                'error' => $exception->getMessage(),
            ]);
        }

        return (array) json_decode($contents, true);
    }

    /**
     * Submits a POST request to an external API.
     *
     * @param array<string, mixed> $formParams
     *
     * @return array<mixed, mixed>
     */
    final public function post(
        string $uri,
        ?int $id = null,
        array $formParams = [],
        ?Closure $callback = null,
    ): array {
        try {
            $result = $this->client?->post($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
                'form_params' => $formParams,
            ]);

            $contents = (string) $result?->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($contents);
            }
        } catch (ClientException|GuzzleException $exception) {
            $contents = (string) json_encode([
                'error' => $exception->getMessage(),
            ]);
        }

        return (array) json_decode($contents, true);
    }

    /**
     * Submits a PUT request to an external API.
     *
     * @param array<string, mixed> $formParams
     *
     * @return array<mixed, mixed>
     */
    final public function put(
        string $uri,
        ?int $id = null,
        array $formParams = [],
        ?Closure $callback = null,
    ): array {
        try {
            $result = $this->client?->put($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
                'form_params' => $formParams,
            ]);

            $contents = (string) $result?->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($contents);
            }
        } catch (ClientException|GuzzleException $exception) {
            $contents = (string) json_encode([
                'error' => $exception->getMessage(),
            ]);
        }

        return (array) json_decode($contents, true);
    }

    /**
     * Submits a DELETE request to an external API.
     *
     * @return array<mixed, mixed>
     */
    final public function delete(
        string $uri,
        ?int $id = null,
        ?Closure $callback = null,
    ): array {
        try {
            $result = $this->client?->delete($uri . ($id !== null ? '/' . $id : ''), [
                'headers' => $this->headerList,
            ]);

            $contents = (string) $result?->getBody()->getContents();

            if (is_callable($callback)) {
                $callback($contents);
            }
        } catch (ClientException|GuzzleException $exception) {
            $contents = (string) json_encode([
                'error' => $exception->getMessage(),
            ]);
        }

        return (array) json_decode($contents, true);
    }

    /**
     * Adds additional headers to the headerList array.
     *
     * @param array<string, mixed> $headerList
     */
    protected function headers(array $headerList): self
    {
        $this->headerList = array_merge($this->headerList, $headerList);

        return $this;
    }
}
