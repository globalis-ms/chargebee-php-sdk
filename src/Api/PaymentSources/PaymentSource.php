<?php

namespace NathanDunn\Chargebee\Api\PaymentSources;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class PaymentSource extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function list(array $parameters = [], array $headers = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('payment_sources');

        return $this->get($url, $resolver->resolve($parameters), $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('payment_sources/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function createUsingTemporaryToken(array $data, array $headers = [])
    {
        $url = $this->url('payment_sources/create_using_temp_token');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function createUsingPermanentToken(array $data, array $headers = [])
    {
        $url = $this->url('payment_sources/create_using_permanent_token');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function createCard(array $data, array $headers = [])
    {
        $url = $this->url('payment_sources/create_card');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function updateCard(string $id, array $data, array $headers = [])
    {
        $url = $this->url('payment_sources/%s/update_card', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function delete(string $id, array $headers = [])
    {
        $url = $this->url('payment_sources/%s/delete', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function switchGatewayAccount(string $id, array $data, array $headers = [])
    {
        $url = $this->url('payment_sources/%s/switch_gateway_account', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array $data
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function export(string $id, array $data, array $headers = [])
    {
        $url = $this->url('payment_sources/%s/export_payment_source', $id);

        return $this->post($url, $data, $headers);
    }
}
