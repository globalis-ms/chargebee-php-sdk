<?php

namespace Globalis\Chargebee\Events;

use Psr\EventDispatcher\StoppableEventInterface;
use Globalis\Chargebee\Util\Str;

class EventChargebeeApiResponse implements StoppableEventInterface
{
    public $site;
    public $method;
    public $url;
    public $endpoint;
    public $endpointStripped;
    public $parameters;
    public $headers;
    public $response;
    public $time;
    public $trace;

    /**
     * @var bool Whether no further event listeners should be triggered
     */
    private $propagationStopped = false;

    public function __construct($client, $method, $url, $parameters, $requestHeaders, $response, $time, $trace)
    {
        $endpoint = Str::removeQueryArgs($url);
        $endpointStripped = substr($endpoint, strlen($client->baseUrl));

        $this->site = $client->site;
        $this->method = $method;
        $this->url = $url;
        $this->endpoint = $endpoint;
        $this->endpointStripped = $endpointStripped;
        $this->parameters = $parameters;
        $this->headers = $requestHeaders;
        $this->response = $response;
        $this->time = $time;
        $this->trace = $trace;
    }

    public function propagate()
    {
        $this->client->eventDispatcher->dispatch($this);
    }

    /**
     * Is propagation stopped?
     *
     * This will typically only be used by the Dispatcher to determine if the
     * previous listener halted propagation.
     *
     * @return bool
     *   True if the Event is complete and no further listeners should be called.
     *   False to continue calling listeners.
     */
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    /**
     * Stops the propagation of the event to further event listeners.
     *
     * If multiple event listeners are connected to the same event, no
     * further event listener will be triggered once any trigger calls
     * stopPropagation().
     */
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }
}
