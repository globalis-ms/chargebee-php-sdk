<?php

namespace NathanDunn\Chargebee\Api;

use finfo;
use Http\Client\Exception;
use Http\Client\Exception\HttpException;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Http\Message\StreamFactory;
use NathanDunn\Chargebee\Client;
use NathanDunn\Chargebee\HttpClient\Exception\ApiExceptionHandler;
use NathanDunn\Chargebee\HttpClient\Message\QueryStringBuilder;
use NathanDunn\Chargebee\HttpClient\Message\ResponseFormatter;
use Symfony\Component\OptionsResolver\OptionsResolver;

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

        try {
            $response = $this->client->getHttpClient()->get($path, $requestHeaders);

            return ResponseFormatter::getContent($response);
        } catch (HttpException $e) {
            (new ApiExceptionHandler($e))->handle();
        }
    }

    /**
     * @param $path
     * @param array $parameters
     * @param array $requestHeaders
     * @param array $files
     *
     * @throws Exception
     *
     * @return array|string
     */
    protected function post($path, array $parameters = [], $requestHeaders = [], array $files = [])
    {
        $path = $this->preparePath($path);

        $body = null;
        if (empty($files) && !empty($parameters)) {
            $body = $this->streamFactory->createStream(QueryStringBuilder::build($parameters));
            $requestHeaders['Content-Type'] = 'application/x-www-form-urlencoded';
        } elseif (!empty($files)) {
            $builder = new MultipartStreamBuilder($this->streamFactory);
            foreach ($parameters as $name => $value) {
                $builder->addResource($name, $value);
            }
            foreach ($files as $name => $file) {
                $builder->addResource($name, fopen($file, 'r'), [
                    'headers' => [
                        'Content-Type' => $this->guessContentType($file),
                    ],
                    'filename' => basename($file),
                ]);
            }
            $body = $builder->build();
            $requestHeaders['Content-Type'] = 'multipart/form-data; boundary='.$builder->getBoundary();
        }

        try {
            $response = $this->client->getHttpClient()->post($path, $requestHeaders, $body);
        } catch (HttpException $e) {
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
        return $this->client->baseUrl.vsprintf($endpoint, $replacements);
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
            $path .= '?'.QueryStringBuilder::build($parameters);
        }

        return $path;
    }

    /**
     * Create a new OptionsResolver with page and per_page options.
     *
     * @return OptionsResolver
     */
    protected function createOptionsResolver(): OptionsResolver
    {
        $resolver = new OptionsResolver();

        $resolver->setDefined('limit')
            ->setAllowedTypes('limit', 'int')
            ->setAllowedValues('limit', function ($value) {
                return $value > 0;
            });

        $resolver->setDefined('offset')
            ->setAllowedTypes('offset', 'string');

        return $resolver;
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
