<?php

namespace Tests\Unit\HttpClient;

use Http\Client\Common\HttpMethodsClient;
use Tests\TestCase;

class BuilderTest extends TestCase
{
    /** @test */
    public function http_client_should_be_an_http_methods_client()
    {
        $this->assertInstanceOf(HttpMethodsClient::class, $this->builder->getHttpClient());
    }
}
