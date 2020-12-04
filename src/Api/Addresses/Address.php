<?php

namespace NathanDunn\Chargebee\Api\Addresses;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Address extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     *
     */
    public function find(array $parameters = [], array $headers = [])
    {
        $url = $this->url('addresses');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     *
     */
    public function update(array $data, array $headers = [])
    {
        $url = $this->url('addresses');

        return $this->post($url, $data, $headers);
    }
}
