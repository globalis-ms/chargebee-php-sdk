<?php

namespace Tests;

use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Strategy\MockClientStrategy;
use NathanDunn\Chargebee\Client;
use NathanDunn\Chargebee\HttpClient\Builder;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    /**
     * @var string
     */
    public static $key = '987654321';

    /**
     * @var string
     */
    public static $site = '123456789';

    /**
     * @var Builder
     */
    public $builder;

    /**
     * @var Client
     */
    public $client;

    /**
     * Set up test case.
     */
    public function setUp(): void
    {
        HttpClientDiscovery::prependStrategy(MockClientStrategy::class);

        $this->builder = new Builder(self::$key);
        $this->client = new Client(self::$site, self::$key, $this->builder);
    }
}
