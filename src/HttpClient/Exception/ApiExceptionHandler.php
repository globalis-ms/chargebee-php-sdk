<?php

namespace Globalis\Chargebee\HttpClient\Exception;

use Http\Client\Exception\HttpException;
use Globalis\Chargebee\HttpClient\Message\ResponseFormatter;
use Globalis\Chargebee\Util\Str;

class ApiExceptionHandler
{
    /**
     * @var
     */
    protected $exception;

    /**
     * @param $exception
     */
    public function __construct(HttpException $exception)
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
     *
     * @return string|null
     */
    private function formatException(array $content)
    {
        if (isset($content['api_error_code'])) {
            return sprintf('Globalis\Chargebee\Exceptions\%sException', Str::studly($content['api_error_code']));
        }
    }
}
