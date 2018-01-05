<?php

namespace NathanDunn\Chargebee\Api\HostedPages;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class HostedPage extends AbstractApi
{
    /**
     * @param array $parameters
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list(array $parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('hosted_pages');

        return $this->get($url, $resolver->resolve($parameters));
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id)
    {
        $url = $this->url('hosted_pages/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function checkoutNewSubscription(array $data = [])
    {
        $url = $this->url('hosted_pages/checkout_new');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function checkoutExistingSubscription(array $data = [])
    {
        $url = $this->url('hosted_pages/checkout_existing');

        return $this->post($url, $data);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function updatePaymentMethod(array $data)
    {
        $url = $this->url('hosted_pages/update_payment_method');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function acknowledge(string $id)
    {
        $url = $this->url('hosted_pages/%s/acknowledge', $id);

        return $this->post($url, []);
    }
}
