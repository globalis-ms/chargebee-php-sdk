<?php

namespace NathanDunn\Chargebee\Api\Events;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Event extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $url = $this->url('events');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param $id
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('events/%s', $id);

        return $this->get($url, [], $headers);
    }
}
