<?php

namespace NathanDunn\Chargebee\Api\CouponCodes;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class CouponCode extends AbstractApi
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

        $url = $this->url('coupon_codes');

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
        $url = $this->url('coupon_codes/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array $headers
     *
     * @return array|string
     * @throws Exception
     */
    public function archive(string $id, array $headers = [])
    {
        $url = $this->url('coupon_codes/%s/archive', $id);

        return $this->post($url, [], $headers);
    }
}
