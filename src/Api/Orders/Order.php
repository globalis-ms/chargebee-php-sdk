<?php

namespace NathanDunn\Chargebee\Api\Orders;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Order extends AbstractApi
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
        $url = $this->url('orders');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('orders/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('orders');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function update(string $id, array $data, array $headers = [])
    {
        $url = $this->url('orders/%s', $id);

        return $this->post($url, $data, $headers);
    }
}
