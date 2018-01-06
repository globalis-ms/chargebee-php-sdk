<?php

namespace NathanDunn\Chargebee\HttpClient\Exception;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Http\Client\Common\Exception\ClientErrorException;
use NathanDunn\Chargebee\Exceptions\ParamWrongValueException;
use Tests\TestCase;

class ApiExceptionHandlerTest extends TestCase
{
    /** @test */
    public function should_find_custom_exception()
    {
        $this->expectException(ParamWrongValueException::class);

        $request = $this->getRequest();
        $response = $this->getResponse(sprintf('%s/data/responses/param_wrong_value.json', __DIR__));
        $exception = new ClientErrorException('Bad Request', $request, $response);

        (new ApiExceptionHandler($exception))->handle();
    }

    /** @test */
    public function should_throw_client_error_exception_for_request()
    {
        $this->expectException(ClientErrorException::class);

        $request = $this->getRequest();
        $response = $this->getResponse(sprintf('%s/data/responses/some_other_error.json', __DIR__));
        $exception = new ClientErrorException('Bad Request', $request, $response);

        (new ApiExceptionHandler($exception))->handle();
    }

    /**
     * @param string $path
     * @return Response
     */
    private function getResponse(string $path)
    {
        $response = file_get_contents($path);

        $headers = [
            'Cache-Control' => [
                "no-store, no-cache, must-revalidate"
            ],
            'Content-Type' => [
                "application/json;charset=UTF-8"
            ],
            'Date' => [
                "Sat, 06 Jan 2018 20:23:27 GMT"
            ],
            'Pragma' => [
                "no-cache"
            ],
            'Server' => [
                "ChargeBee"
            ],
            'Vary' => [
                "Accept-Encoding"
            ],
            'Content-Length' => [
                "212"
            ],
            'Connection' => [
                "keep-alive"
            ],
        ];

        return new Response(400, $headers, $response);
    }

    /**
     * @return Request
     */
    private function getRequest()
    {
        $headers = [
            'Host' => [
                "test.chargebee.com",
            ],
            'Content-Type' => [
                "application/x-www-form-urlencoded"
            ],
            'Authorization' => [
                "Basic xxx"
            ],
        ];

        return new Request('POST', 'https://test.chargebee.com/api/v2/customers', $headers, 'email=github%40nathandunn.');
    }
}