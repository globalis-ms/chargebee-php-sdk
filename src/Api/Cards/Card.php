<?php

namespace NathanDunn\Chargebee\Api\Cards;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Card extends AbstractApi
{
    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('cards/%s', $id);

        return $this->get($url);
    }

    /**
     * @param string $customerId
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function copy(string $customerId, array $data)
    {
        $url = $this->url('customers/%s/copy_card', $customerId);

        return $this->post($url, $data);
    }

    /**
     * @param string $customerId
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function update(string $customerId, array $data)
    {
        $url = $this->url('customers/%s/credit_card', $customerId);

        return $this->post($url, $data);
    }

    /**
     * @param $customerId
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function switchGateway($customerId, array $data)
    {
        $url = $this->url('customers/%s/switch_gateway', $customerId);

        return $this->post($url, $data);
    }

    /**
     * @param string $customerId
     * @return array|string
     * @throws Exception
     */
    public function delete(string $customerId)
    {
        $url = $this->url('customers/%s/delete_card', $customerId);

        return $this->post($url, []);

    }
}