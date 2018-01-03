<?php

namespace NathanDunn\Chargebee\HttpClient;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\StreamFactoryDiscovery;
use Http\Message\Authentication\BasicAuth;
use Http\Message\MessageFactory;
use Http\Message\RequestFactory;
use Http\Message\StreamFactory;

class Builder
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var MessageFactory
     */
    protected $requestFactory;

    /**
     * @var StreamFactory
     */
    protected $streamFactory;

    /**
     * @var HttpMethodsClient
     */
    protected $httpMethodsClient;

    /**
     * @var string
     */
    protected $key;

    /**
     * @param string $key
     * @param HttpClient $httpClient
     * @param RequestFactory $requestFactory
     * @param StreamFactory $streamFactory
     */
    public function __construct(
        string $key,
        HttpClient $httpClient = null,
        RequestFactory $requestFactory = null,
        StreamFactory $streamFactory = null
    )
    {
        $this->key = $key;
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: MessageFactoryDiscovery::find();
        $this->streamFactory = $streamFactory ?: StreamFactoryDiscovery::find();
    }

    /**
     * @return HttpMethodsClient
     */
    public function getHttpClient(): HttpMethodsClient
    {
        $authenticator = $this->getAuthenticationPlugin();

        $this->httpMethodsClient = new HttpMethodsClient(
//            new PluginClient($this->httpClient, [$authenticator, new ErrorPlugin]),
            new PluginClient($this->httpClient, [$authenticator]),
            $this->requestFactory
        );

        return $this->httpMethodsClient;
    }

    /**
     * @return RequestFactory
     */
    public function getRequestFactory(): RequestFactory
    {
        return $this->requestFactory;
    }

    /**
     * @return StreamFactory
     */
    public function getStreamFactory(): StreamFactory
    {
        return $this->streamFactory;
    }

    /**
     * @return AuthenticationPlugin
     */
    protected function getAuthenticationPlugin(): AuthenticationPlugin
    {
        $authentication = new BasicAuth($this->key, null);

        return new AuthenticationPlugin($authentication);
    }
}