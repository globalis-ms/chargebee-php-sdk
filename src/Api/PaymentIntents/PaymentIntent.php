<?php

namespace NathanDunn\Chargebee\Api\PaymentIntents;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class PaymentIntent extends AbstractApi
{
    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     *
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('payment_intents');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     *
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('payment_intents/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     *
     */
    public function update(string $id, array $data, array $headers = [])
    {
        $url = $this->url('payment_intents/%s', $id);

        return $this->post($url, $data, $headers);
    }
}
