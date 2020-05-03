<?php

namespace NathanDunn\Chargebee\Api\CreditNotes;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class CreditNote extends AbstractApi
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
        $url = $this->url('credit_notes');

        return $this->get($url, $parameters, $headers);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('credit_notes/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function findAsPdf(string $id, array $headers = [])
    {
        $url = $this->url('credit_notes/%s/pdf', $id);

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
        $url = $this->url('credit_notes');

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
    public function recordRefund(string $id, array $data, array $headers = [])
    {
        $url = $this->url('credit_notes/%s/record_refund', $id);

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
    public function void(string $id, array $data, array $headers = [])
    {
        $url = $this->url('credit_notes/%s/void', $id);

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
    public function delete(string $id, array $data, array $headers = [])
    {
        $url = $this->url('credit_notes/%s/delete', $id);

        return $this->post($url, $data, $headers);
    }
}
