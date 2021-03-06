<?php

namespace Globalis\Chargebee\Api;

use finfo;
use Http\Client\Exception;
use Http\Client\Exception\HttpException;
use Http\Message\StreamFactory;
use Globalis\Chargebee\Events\EventChargebeeApiResponseSuccess as EventResponseSuccess;
use Globalis\Chargebee\Events\EventChargebeeApiResponseError as EventResponseError;
use Globalis\Chargebee\Client;
use Globalis\Chargebee\HttpClient\Exception\ApiExceptionHandler;
use Globalis\Chargebee\HttpClient\Message\QueryStringBuilder;
use Globalis\Chargebee\HttpClient\Message\ResponseFormatter;
use Globalis\WP\Cubi;

abstract class AbstractApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var StreamFactory
     */
    protected $streamFactory;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->streamFactory = $client->getStreamFactory();
    }

    /**
     * Performs a GET query and returns the response as a PSR-7 response object.
     *
     * @param $path
     * @param array $parameters
     * @param array $requestHeaders
     *
     * @throws Exception
     *
     * @return array|string
     */
    protected function get($path, array $parameters = [], array $requestHeaders = [])
    {
        $path = $this->preparePath($path, $parameters);

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $timer_name = $path . '_' . microtime();
        Cubi\time_start($timer_name);

        try {
            $response = $this->client->getHttpClient()->get($path, $requestHeaders);

            $time = Cubi\time_elapsed($timer_name, false);
            $event = new EventResponseSuccess($this->client, 'GET', $path, $parameters, $requestHeaders, $response, $time, $trace);
            Client::dispatchEvent($event);

            return ResponseFormatter::getContent($response);
        } catch (HttpException $e) {
            $response = $e->getResponse();

            $time = Cubi\time_elapsed($timer_name, false);
            $event = new EventResponseError($this->client, 'GET', $path, $parameters, $requestHeaders, $response, $time, $trace);
            Client::dispatchEvent($event);

            (new ApiExceptionHandler($e))->handle();
        }
    }

    /**
     * @param $path
     * @param array $parameters
     * @param array $requestHeaders
     *
     * @throws Exception
     *
     * @return array|string
     */
    protected function post($path, array $parameters = [], $requestHeaders = [])
    {
        $path = $this->preparePath($path);

        $body = null;
        if (!empty($parameters)) {
            $body = $this->streamFactory->createStream(QueryStringBuilder::build($parameters));
            $requestHeaders['Content-Type'] = 'application/x-www-form-urlencoded';
        }

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $timer_name = $path . '_' . microtime();
        Cubi\time_start($timer_name);

        try {
            $response = $this->client->getHttpClient()->post($path, $requestHeaders, $body);

            $time = Cubi\time_elapsed($timer_name, false);
            $event = new EventResponseSuccess($this->client, 'POST', $path, $parameters, $requestHeaders, $response, $time, $trace);
            Client::dispatchEvent($event);
        } catch (HttpException $e) {
            $response = $e->getResponse();

            $time = Cubi\time_elapsed($timer_name, false);
            $event = new EventResponseError($this->client, 'POST', $path, $parameters, $requestHeaders, $response, $time, $trace);
            Client::dispatchEvent($event);

            (new ApiExceptionHandler($e))->handle();
        }

        return ResponseFormatter::getContent($response);
    }

    /**
     * Generate URL from base url and given endpoint.
     *
     * @param string $endpoint
     * @param array  $replacements
     *
     * @return string
     */
    protected function url(string $endpoint, ...$replacements): string
    {
        return $this->client->baseUrl . vsprintf($endpoint, $replacements);
    }

    /**
     * @param $path
     * @param array $parameters
     *
     * @return string
     */
    private function preparePath($path, array $parameters = []): string
    {
        if (count($parameters) > 0) {
            $path .= '?' . QueryStringBuilder::build($parameters);
        }

        return $path;
    }

    /**
     * @param $file
     *
     * @return string
     */
    private function guessContentType($file): string
    {
        if (!class_exists(finfo::class, false)) {
            return 'application/octet-stream';
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        return $finfo->file($file);
    }
}
