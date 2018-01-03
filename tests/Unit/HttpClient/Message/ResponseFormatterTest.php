<?php

namespace Tests\Unit\HttpClient\Message;

use GuzzleHttp\Psr7\Response;
use NathanDunn\Chargebee\HttpClient\Message\ResponseFormatter;
use Tests\TestCase;

class ResponseFormatterTest extends TestCase
{
    /** @test */
    public function should_get_content()
    {
        $body = ['foo' => 'bar'];
        $response = new Response(
            200,
            ['Content-Type'=>'application/json'],
            \GuzzleHttp\Psr7\stream_for(json_encode($body))
        );

        $this->assertEquals($body, ResponseFormatter::getContent($response));
    }

    /**
     * If content-type is not json we should get the raw body.
     * @test
     */
    public function should_get_content_not_json()
    {
        $body = 'foobar';
        $response = new Response(
            200,
            [],
            \GuzzleHttp\Psr7\stream_for($body)
        );

        $this->assertEquals($body, ResponseFormatter::getContent($response));
    }

    /**
     * Make sure we return the body if we have invalid json
     * @test
     */
    public function should_get_content_invalid_json()
    {
        $body = 'foobar';
        $response = new Response(
            200,
            ['Content-Type'=>'application/json'],
            \GuzzleHttp\Psr7\stream_for($body)
        );

        $this->assertEquals($body, ResponseFormatter::getContent($response));
    }
}