<?php

namespace NathanDunn\Chargebee\HttpClient\Exception;

use Http\Client\Common\Exception\ClientErrorException;
use Http\Client\Exception\HttpException;
use NathanDunn\Chargebee\HttpClient\Message\ResponseFormatter;
use NathanDunn\Chargebee\Util\Str;

class ApiExceptionHandler
{
    /**
     * @var
     */
    protected $exception;

    /**
     * @param $exception
     */
    public function __construct(ClientErrorException $exception)
    {
        $this->exception = $exception;
    }

    /**
     * @throws HttpException
     */
    public function handle()
    {
        $response = $this->exception->getResponse();
        $content = ResponseFormatter::getContent($response);
        $exception = $this->formatException($content);

        if (class_exists($exception)) {
            throw new $exception(
                isset($content['message']) ? $content['message'] : $this->exception->getMessage(),
                $this->exception->getRequest(),
                $response
            );
        }

        throw $this->exception;
    }

    /**
     * @param array $content
     * @return string|null
     */
    private function formatException(array $content)
    {
        if (isset($content['api_error_code'])) {
            return sprintf('NathanDunn\Chargebee\Exceptions\%sException', Str::studly($content['api_error_code']));
        }

        return null;
    }
}
