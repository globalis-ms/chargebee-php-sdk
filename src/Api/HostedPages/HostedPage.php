<?php

namespace NathanDunn\Chargebee\Api\HostedPages;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class HostedPage extends AbstractApi
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
        $url = $this->url('hosted_pages');

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
        $url = $this->url('hosted_pages/%s', $id);

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
    public function checkoutNewSubscription(array $data = [], array $headers = [])
    {
        $url = $this->url('hosted_pages/checkout_new');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function checkoutExistingSubscription(array $data = [], array $headers = [])
    {
        $url = $this->url('hosted_pages/checkout_existing');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function updatePaymentMethod(array $data, array $headers = [])
    {
        $url = $this->url('hosted_pages/update_payment_method');

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
    public function acknowledge(string $id, array $headers = [])
    {
        $url = $this->url('hosted_pages/%s/acknowledge', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function collectNow(array $data = [], array $headers = [])
    {
        $url = $this->url('hosted_pages/collect_now');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function managePaymentSources(array $data = [], array $headers = [])
    {
        $url = $this->url('hosted_pages/manage_payment_sources');

        return $this->post($url, $data, $headers);
    }
}
