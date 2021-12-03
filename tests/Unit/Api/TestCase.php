<?php

namespace Tests\Unit\Api;

use Http\Client\HttpClient;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\StreamFactoryDiscovery;
use Globalis\Chargebee\Client;
use Globalis\Chargebee\HttpClient\Builder;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @return string
     */
    abstract protected function getApiClass();

    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getApiMock(array $methods = [])
    {
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $httpClient
            ->expects($this->any())
            ->method('sendRequest');

        $builder = new Builder(self::$key, $httpClient, MessageFactoryDiscovery::find(), StreamFactoryDiscovery::find());
        $client = new Client(self::$site, self::$key, $builder);

        return $this->getMockBuilder($this->getApiClass())
            ->setMethods(array_merge(['get', 'post'], $methods))
            ->setConstructorArgs([$client])
            ->getMock();
    }

    /**
     * @param $path
     *
     * @return mixed
     */
    public function getContent($path)
    {
        $content = file_get_contents($path);

        return json_decode($content);
    }
}
