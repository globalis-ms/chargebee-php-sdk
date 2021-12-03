<?php

namespace Globalis\Chargebee\Api\PaymentIntents;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class PaymentIntent extends AbstractApi
{
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
        $url = $this->url('payment_intents');

        return $this->post($url, $data, $headers);
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
        $url = $this->url('payment_intents/%s', $id);

        return $this->get($url, [], $headers);
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
        $url = $this->url('payment_intents/%s', $id);

        return $this->post($url, $data, $headers);
    }
}
