<?php

namespace NathanDunn\Chargebee\Api\Cards;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Card extends AbstractApi
{
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
        $url = $this->url('cards/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $customerId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function copy(string $customerId, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/copy_card', $customerId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $customerId
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function update(string $customerId, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/credit_card', $customerId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param $customerId
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function switchGateway($customerId, array $data, array $headers = [])
    {
        $url = $this->url('customers/%s/switch_gateway', $customerId);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $customerId
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function delete(string $customerId, array $headers = [])
    {
        $url = $this->url('customers/%s/delete_card', $customerId);

        return $this->post($url, [], $headers);
    }
}
