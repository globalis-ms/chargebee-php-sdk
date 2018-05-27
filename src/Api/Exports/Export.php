<?php

namespace NathanDunn\Chargebee\Api\Exports;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class Export extends AbstractApi
{
    /**
     * @param string $id
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('exports/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function revenueRecognition(array $data = [], array $headers = [])
    {
        $url = $this->url('exports/revenue_recognition');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     * @return array|string
     * @throws Exception
     */
    public function deferredRevenue(array $data = [], array $headers = [])
    {
        $url = $this->url('exports/deferred_revenue');

        return $this->post($url, $data, $headers);
    }
}